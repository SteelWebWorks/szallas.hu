<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticationController extends Controller
{
    public function register(Request $request)
    {

        $params = $request->all();
        if (User::where('email', $params['email'])->exists()) {
            return response()->json([
                'message' => 'Email already exist in the database',
            ], 400);
        }
        $user = User::create([
            'name' => $params['name'],
            'email' => strtolower($params['email']),
            'password' => $params['password'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User Account Created Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => strtolower($request->input('email')),
            'password' => $request->input('password'),
        ];
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Authentication Failed',
            ], 401);
        }

        $user = User::where('email', $credentials['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Succesfully Logged out',
        ], 200);
    }

}
