<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log; // Import Log for debugging

class NotifyLKService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendSMS($phoneNumber, $message)
    {
        $userId = env('NOTIFYLK_USER_ID');
        $apiKey = env('NOTIFYLK_API_KEY');
        $senderId = env('NOTIFYLK_SENDER_ID');

        try {
            // Making the API call
            $response = $this->client->post('https://app.notify.lk/api/v1/send', [
                'form_params' => [
                    'user_id' => $userId,
                    'api_key' => $apiKey,
                    'sender_id' => $senderId,
                    'to' => $phoneNumber,
                    'message' => $message,
                ]
            ]);

            $responseBody = json_decode($response->getBody(), true);

            // Log the entire response for debugging
            Log::info('NotifyLK API Response', ['response' => $responseBody]);

            if ($responseBody['status'] == 'success') {
                return ['success' => true, 'message' => 'SMS sent successfully.'];
            } else {
                // Log the error status and message
                Log::error('NotifyLK API Error', ['error' => $responseBody]);
                return ['success' => false, 'message' => $responseBody['status_message']];
            }
        } catch (\Exception $e) {
            // Log the exception message
            Log::error('NotifyLK Exception', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
