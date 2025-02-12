<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request) {
        try {
            $user = User::create($request->all());
            $token = $user->createToken('MyApp')->plainTextToken;

            return response()->json([
                'message' => 'register success',
                'data' => $user,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'invalid field',
                'error' => $e,
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'forbidden',
                'error' => $e
            ], 403);
        }
    }

    public function login(Request $request) {
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->plainTextToken;

            return response()->json([
                'message' => 'login success',
                'token' => $token,
            ],  200);
        }

        return response()->json([
            'message' => 'invalid login',
        ], 401);
    }

    public function logout(Request $request) {
        $user = Auth::user();

        if ($user) {
            $user->tokens()->delete();
            return response([
                'message' => 'logout success'
            ], 200);
        }

        return response([
            'message' => 'unathorized user',
        ], 401);
    }
}
