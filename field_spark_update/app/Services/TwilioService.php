<?php

// app/Services/TwilioService.php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    protected $client;
    protected $from;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');

        if (empty($sid) || empty($token)) {
            Log::error('Twilio SID or Token is missing.');
            throw new \Exception('Twilio credentials are not set.');
        }

        $this->client = new Client($sid, $token);
        $this->from = config('services.twilio.from');
    }

    public function sendSMS($to, $message)
    {
        try {
            $this->client->messages->create($to, [
                'from' => $this->from,
                'body' => $message
            ]);
            return response()->json(['message' => 'SMS sent successfully.']);
        } catch (\Exception $e) {
            Log::error('Twilio SMS error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send SMS.'], 500);
        }
    }
}
