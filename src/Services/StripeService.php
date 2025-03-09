<?php

namespace ScriptingThoughts\Services;

use Exception;
use Stripe\StripeClient;
use ScriptingThoughts\Utils\StringUtils;

class StripeService {
    private $client;

    public function __construct() {
        // This can be simplified to:
        $this->client = new StripeClient($_ENV["STRIPE_API_KEY"]);
    }

    public function stripeCheckoutSession() {
        $uuid = StringUtils::generateUuid();
    
        try {
            $checkout_session = $this->client->checkout->sessions->create([
                'invoice_creation' => [
                    'enabled' => true,
                    'invoice_data' => [
                        'metadata' =>  ['order_id' => $uuid]
                    ]
                ],
                'line_items' => [[
                    'price' => 'price_1QT8iTFQfS92WxX5p9ADUFvi',
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'ui_mode' => 'embedded',
                'redirect_on_completion' => 'never',   
                'metadata' => ['order_id' => $uuid],
            ]);
            
            return $checkout_session;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle Stripe API errors
            throw $e;
        }
    }

    public function getCheckoutSession($checkoutId) {
        $checkoutSession = $this->client->checkout->sessions->retrieve(
            $checkoutId,
            []
            );

        return $checkoutSession;
    }

    public function getCharge($sessionId) {
        $session = $this->client->checkout->sessions->retrieve($sessionId);
    
        // Check payment status
        if ($session->payment_status === 'paid') {
            // Get the payment intent ID from the session
            $paymentIntentId = $session->payment_intent;
    
            // Retrieve the payment intent
            $paymentIntent = $this->client->paymentIntents->retrieve($paymentIntentId);
            
            // Get the latest charge ID
            $chargeId = $paymentIntent->latest_charge;
            
            // Retrieve the charge details
            $charge = $this->client->charges->retrieve($chargeId);
                      
            $charge = $this->client->charges->retrieve($chargeId);
        }
        return $charge;
    }

    public function verifyPayment($sessionId) {
        try {
            if ($sessionId === 'undefined') {
                return json_encode([
                    'success' => false,
                    'seesion_id' => $sessionId,
                    'error' => 'Session ID not provided'
                ]);
            }
            
            // Retrieve the session
            $session = $this->client->checkout->sessions->retrieve($sessionId);
    
            // Check payment status
            if ($session->payment_status === 'paid') {
  

                // Payment successful
                return [
                    'success' => true,
                    'checkout_session' => $session,
                    'order_id' => $session->metadata->order_id,
                    'amount' => $session->amount_total / 100,
                    'currency' => $session->currency
                    // 'charge' => $charge, // Include the full charge details
                    // 'customer_name' => $charge->billing_details->name,
                    // 'customer_email' => $charge->billing_details->email,
                    // 'payment_method_details' => $charge->payment_method_details
                ];
            } else {
                return [
                    'success' => false,
                    'status' => $session->payment_status,
                    'error' => 'Payment not completed'
                ];
            }
            
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}

// http://localhost:3000/?session_id=cs_test_a14tU6iAlNwUPoNrb6Uhqa0THS8nQrIbNneGl2vwcKdNLzCRHlTDbZ8z46