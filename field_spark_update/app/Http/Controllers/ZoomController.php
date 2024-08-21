<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ZoomController extends Controller
{
    public function authorize()
    {
        $clientId = env('ZOOM_CLIENT_ID');
        $redirectUri = route('zoom.callback');
        $authorizeUrl = "https://zoom.us/oauth/authorize?response_type=code&client_id={$clientId}&redirect_uri={$redirectUri}";

        return redirect($authorizeUrl);
    }

    public function callback(Request $request)
    {
        $code = $request->input('code');
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $redirectUri = route('zoom.callback');

        $response = Http::asForm()->post('https://zoom.us/oauth/token', [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        $data = $response->json();
        $accessToken = $data['access_token'];
        $refreshToken = $data['refresh_token'];
        $expiresIn = $data['expires_in'];

        session([
            'zoom_access_token' => $accessToken,
            'zoom_refresh_token' => $refreshToken,
            'zoom_token_expires_at' => now()->addSeconds($expiresIn),
        ]);

        return redirect()->route('appointments.index')->with('success', 'Zoom authorized successfully.');
    }

    public function refreshAccessToken()
{
    try {
        $client = new \GuzzleHttp\Client();
        $response = $client->post('https://zoom.us/oauth/token', [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode(env('ZOOM_CLIENT_ID') . ':' . env('ZOOM_CLIENT_SECRET')),
            ],
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => session('zoom_refresh_token'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        // Debug the response
        dd($data);

        // Check if access token is present
        if (!isset($data['access_token'])) {
            return response()->json(['error' => 'Unable to retrieve access token.'], 500);
        }

        // Assuming the response includes 'expires_in' and 'refresh_token'
        $expiresIn = $data['expires_in'];
        $refreshToken = $data['refresh_token'];

        session([
            'zoom_access_token' => $data['access_token'],
            'zoom_refresh_token' => $refreshToken,
            'zoom_token_expires_at' => now()->addSeconds($expiresIn),
        ]);

    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to refresh access token: ' . $e->getMessage()], 500);
    }
}

}
