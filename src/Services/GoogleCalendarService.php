<?php

namespace ScriptingThoughts\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;

class GoogleCalendarService {
    private $client;

    public function __construct() {
        $this->client = new Client();
    }

    private function getGoogleAccessToken() {
        $now = time();

        $claims = [
            'iss' => $_ENV["GOOGLE_SERVICE_ACCOUNT_EMAIL"],
            'scope' => 'https://www.googleapis.com/auth/calendar',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => $now + 3600,
            'iat' => $now,
        ];

        try {
            $jwt = JWT::encode(
                $claims, 
                $_ENV["GOOGLE_SERVICE_ACCOUNT_PKEY"], 
                'RS256'
            );

            $response = $this->client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                    'assertion' => $jwt
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['access_token'];

        } catch (Exception $e) {
            error_log('Error getting access token: ' . $e->getMessage());
            throw $e;
        }
    }

    public function sendRequest($url, $method = 'GET', $data = []) {
        try {
            $accessToken = $this->getGoogleAccessToken();

            $options = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ];

            if (!empty($data)) {
                $options['json'] = $data;
            }

            $response = $this->client->request($method, $url, $options);
            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {
            error_log('Error sending request: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getListOfEvents($calendarId) {
        try {
            $result = $this->sendRequest(
                "https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events?key={$_ENV['GOOGLE_API_KEY']}"
            );
            
            error_log('Events retrieved successfully');
            return $result;
        } catch (Exception $e) {
            error_log('Failed to retrieve events: ' . $e->getMessage());
            return 'Failed to retrieve events: ' . $e->getMessage();
        }
    }

    public function insertEvent($calendarId, $eventData) {
        try {
            $result = $this->sendRequest(
                "https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events?key={$_ENV['GOOGLE_API_KEY']}",
                "POST",
                $eventData
            );
           
            error_log('Event inserted successfully');
            return $result;
        } catch (Exception $e) {
            error_log('Failed to insert event: ' . $e->getMessage());
            return 'Failed to insert event: ' . $e->getMessage();
        }
    }
}