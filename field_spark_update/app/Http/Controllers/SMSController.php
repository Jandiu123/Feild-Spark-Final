<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotifyLKService;
use Illuminate\Support\Facades\Log; // Import Log for debugging

class SMSController extends Controller
{
    protected $notifyLKService;

    public function __construct(NotifyLKService $notifyLKService)
    {
        $this->notifyLKService = $notifyLKService;
    }

    public function sendSMS(Request $request)
    {
        $request->validate([
            'zoomLink' => 'required|url',
            'phoneNumber' => 'required|regex:/^[0-9]{10,15}$/'
        ]);

        $zoomLink = $request->zoomLink;
        $phoneNumber = $request->phoneNumber;

        $message = "Join the Zoom meeting using this link: $zoomLink";

        try {
            $response = $this->notifyLKService->sendSMS($phoneNumber, $message);
    
            if ($response['success']) {
                session()->flash('success', 'SMS sent successfully.');
                return redirect()->back();
            } else {
                session()->flash('error', 'Failed to send SMS: ' . $response['message']);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while sending the SMS. Please try again.');
            return redirect()->back();
        }
    }
}
