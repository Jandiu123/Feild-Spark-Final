<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'phone' => 'required',
                'password' => 'required|string|min:8|confirmed'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if ($request->password !== $request->password_confirmation) {
                return redirect()->back()->withErrors(['message' => 'Passwords do not match'])->withInput();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')->with('status', 'Registration successful! You can now log in.');
            response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function loginUser(Request $request)
{
    try {
        $validateUser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validateUser->fails()) {
            return redirect()->back()->withErrors($validateUser->errors())->withInput();
        }

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['message' => 'Email & Password do not match with our records.'])->withInput();
        }

        return redirect()->route('dashboard')->with('message', 'User Logged In Successfully');

    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['message' => $th->getMessage()])->withInput();
    }
}

}