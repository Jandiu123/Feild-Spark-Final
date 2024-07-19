<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InstructorAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()], 400);
        }

        $instructor = Instructor::create([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'job' => $request->job,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('status', 'Registration successful! You can now log in.');
        response()->json(['status' => true, 'message' => 'Instructor registered successfully', 'instructor' => $instructor], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $instructor = Instructor::where('email', $request->email)->first();

        if (! $instructor || ! Hash::check($request->password, $instructor->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $instructor->createToken('instructor-token')->plainTextToken;

        return response()->json(['status' => true, 'token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['status' => true, 'message' => 'Logged out successfully'], 200);
    }
}
