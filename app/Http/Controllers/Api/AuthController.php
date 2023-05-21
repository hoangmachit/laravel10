<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors(), 400);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return sendError('Login fail', 500);
        }
        if (Auth::attempt($validator->validated())) {
            $user = Auth::user();
            $token = $user->createToken('Bearer Token')->plainTextToken;
            return sendResponse([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], "Login success !!!");
        } else {
            return sendError('Invalid credentials', 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return sendResponse('Logout successful', 200);
    }

    public function user(Request $request)
    {
        $user = $request->user();

        return sendResponse($user, 200);
    }

    public function verifyToken(Request $request)
    {
        return sendResponse('Token verification successful', 200);
    }
}