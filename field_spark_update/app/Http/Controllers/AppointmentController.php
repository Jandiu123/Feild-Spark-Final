<?php

// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Instructor; // Import Instructor model if needed
use Google_Client;
use Google_Service_Calendar;
use Twilio\Rest\Client;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'instructor_id' => 'required|exists:instructors,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Create an appointment
        Appointment::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
            'instructor_id' => $request->instructor_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Your appointment is successfully placed!');
    }
    
    public function getAppointments($instructorId)
{
    // Fetch appointments for the given instructor
    $appointments = Appointment::where('instructor_id', $instructorId)->get();

    return response()->json($appointments);
}

public function destroy($id)
{
    $appointment = Appointment::find($id);

    if ($appointment) {
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted successfully.'], 200);
    }

    return response()->json(['message' => 'Appointment not found.'], 404);
}
public function transfer(Request $request, $id)
{
    $appointment = Appointment::find($id);
    $newInstructorId = $request->input('instructor_id');

    if ($appointment && $newInstructorId) {
        $appointment->instructor_id = $newInstructorId;
        $appointment->save();

        return response()->json(['message' => 'Appointment transferred successfully.'], 200);
    }

    return response()->json(['message' => 'Error transferring appointment.'], 400);
}

public function createGoogleMeetAndNotify(Request $request)
{
    // Assuming you want to use the currently authenticated user
    $instructor = Auth::guard('instructor')->user()->id;
    $appointment = Appointment::where('instructor_id', $instructor->id)->first(); // Adjust this query as needed

    if (!$appointment) {
        return response()->json(['message' => 'Appointment not found.'], 404);
    }

    // Initialize Google Client
    $client = new Google_Client();
    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
    $client->addScope(Google_Service_Calendar::CALENDAR);

    // Check if access token is stored in session
    if (!session()->has('google_access_token')) {
        return response()->json(['message' => 'Google authentication required.'], 401);
    }

    $accessToken = session('google_access_token');
    $client->setAccessToken($accessToken);

    // Create Google Calendar Event
    $service = new Google_Service_Calendar($client);
    $event = new Google_Service_Calendar_Event([
        'summary' => 'Appointment with ' . $appointment->first_name . ' ' . $appointment->last_name,
        'start' => ['dateTime' => $appointment->date . 'T' . $appointment->time . ':00'],
        'end' => ['dateTime' => $appointment->date . 'T' . ($appointment->time + 1) . ':00'],
        'conferenceData' => [
            'createRequest' => [
                'requestId' => 'sample123',
                'conferenceSolutionKey' => ['type' => 'hangoutsMeet']
            ]
        ]
    ]);
    $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

    // Get Google Meet Link
    $meetLink = $event->getHangoutLink();

    // Send SMS via Twilio
    $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    $twilio->messages->create($appointment->contact_number, [
        'from' => env('TWILIO_PHONE_NUMBER'),
        'body' => 'Your Google Meet link: ' . $meetLink
    ]);

    return response()->json(['message' => 'Google Meet created and SMS sent.']);
}
public function handleGoogleCallback(Request $request)
{
    $client = new Google_Client();
    $client->setClientId(env('GOOGLE_CLIENT_ID'));
    $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
    $client->addScope(Google_Service_Calendar::CALENDAR);

    $accessToken = $client->fetchAccessTokenWithAuthCode($request->input('code'));
    $client->setAccessToken($accessToken);

    // Store the access token in the session or database
    session(['google_access_token' => $accessToken]);

    return redirect()->route('adminappoint');
}

public function showAdminAppointmentPage($appointmentId)
{
    $appointment = Appointment::find($appointmentId);
    if (!$appointment) {
        return redirect()->back()->with('error', 'Appointment not found.');
    }

    return view('adminappoint', compact('appointment'));
}


}
