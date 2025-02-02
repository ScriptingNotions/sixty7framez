<?php

namespace ScriptingThoughts\Services;

use Exception;
use Stripe\StripeClient;

class StripeService {
    private $client;

    public function __construct() {
        // This can be simplified to:
        $this->client = new StripeClient($_ENV["STRIPE_API_KEY"]);
    }

    public function stripeCheckoutSession() {
        try {
            $checkout_session = $this->client->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'invoice_creation' => ['enabled' => true],
                'line_items' => [[
                    'price' => 'price_1QT8iTFQfS92WxX5p9ADUFvi',
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'ui_mode' => 'embedded',
                'redirect_on_completion' => 'never',              
                'metadata' => ['order_id' => '6735'],
                //'return_url' => 'http://localhost:3000/booking/complete?session_id={CHECKOUT_SESSION_ID}',
                //'customer_email' => 'noviceone@outlook.com'// Replace with actual customer email
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

    // // Webhook handler for automatic status updates
    // public function handleStripeWebhook() {
    //     $payload = @file_get_contents('php://input');
    //     $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    //     $endpoint_secret = 'your_webhook_signing_secret'; // Replace with your webhook secret

    //     try {
    //         $event = \Stripe\Webhook::constructEvent(
    //             $payload,
    //             $sig_header,
    //             $endpoint_secret
    //         );

    //         // Handle the checkout.session.completed event
    //         if ($event->type === 'checkout.session.completed') {
    //             $session = $event->data->object;
                
    //             // Verify it's paid
    //             if ($session->payment_status === 'paid') {
    //                 // Get the order ID from metadata
    //                 $orderId = $session->metadata->order_id;
                    
    //                 // Update your database
    //                 // $this->updateOrderStatus($orderId, 'paid');
                    
    //                 // You can also handle invoice retrieval here
    //                 if ($session->invoice) {
    //                     $invoice = $this->client->invoices->retrieve($session->invoice);
    //                     // Store invoice details if needed
    //                 }
    //             }
    //         }

    //         return ['success' => true];
    //     } catch (\UnexpectedValueException $e) {
    //         return ['error' => 'Webhook error: Invalid payload'];
    //     } catch (\Stripe\Exception\SignatureVerificationException $e) {
    //         return ['error' => 'Webhook error: Invalid signature'];
    //     }
    // }

    public function verifyPayment($sessionId) {
        try {
            
            if ($sessionId === 'undefined') {
                return json_encode([
                    'success' => false,
                    'error' => 'Session ID not provided'
                ]);
            }
            
            // Retrieve the session
            $session = $this->client->checkout->sessions->retrieve($sessionId);

            // Check payment status
            if ($session->payment_status === 'paid') {
                // Payment successful
                // Update your database here with order details
                return [
                    'success' => true,
                    'order_id' => $session->metadata->order_id,
                    'amount' => $session->amount_total / 100,
                    'currency' => $session->currency
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