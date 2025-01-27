<?php

namespace ScriptingThoughts\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Firebase\JWT\JWT;

class GoogleCalendarService {
    private $serviceAccountInfo;
    private $client;

    public function __construct($serviceAccountInfo) {
        $this->serviceAccountInfo = $serviceAccountInfo;
        $this->client = new Client();
    }

    private function getGoogleAccessToken() {
        $now = time();

        $claims = [
            'iss' => $this->serviceAccountInfo['client_email'],
            'scope' => 'https://www.googleapis.com/auth/calendar',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => $now + 3600,
            'iat' => $now,
        ];

        try {
            $jwt = JWT::encode(
                $claims, 
                $this->serviceAccountInfo['private_key'], 
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

    public function sendRequest($url, $data = [], $method = 'GET') {
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
   // https://www.googleapis.com/calendar/v3/calendars/[CALENDARID]/events?key=[YOUR_API_KEY]
    public function getListOfEvents($calendarId) {
        try {
            $result = $this->sendRequest(
                "https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events?key=AIzaSyC8cde_YCQxGoXus9ljZZA9sLmnvA7Gx2Y"
            );
            
            error_log('Events retrieved successfully');
            return $result;
        } catch (Exception $e) {
            error_log('Failed to retrieve events: ' . $e->getMessage());
            return 'Failed to retrieve events: ' . $e->getMessage();
        }
    }
}