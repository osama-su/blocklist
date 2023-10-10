<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'registration_number' => 'required',
            'commercial_name' => 'required',
            'industry' => 'required',
            'phone_number' => 'required',
            'national_address' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $validated['name'] = $validated['commercial_name'];

        $user = User::create($validated);

        $token = $user->createToken('API')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($validated)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    public function forgotPassword(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'phone_number' => 'required',
        ]);

        $user = User::where('phone_number', $validated['phone_number'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $token = rand(100000, 999999);

        // save token in password_resets table
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $token,
        ]);

        // todo: Send SMS with $token to $user->phone_number

        // Todo: remove token from response in production
        return response()->json([
            'message' => 'Token sent',
            'token' => $token,
        ]);
    }

    public function resetPassword(Request $request)
    {
        // Validate the request...
        $validated = $request->validate([
            'phone_number' => 'required',
            'token' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::where('phone_number', $validated['phone_number'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        $passwordReset = DB::table('password_reset_tokens')->where('email', $user->email)->first();

        if (!$passwordReset) {
            return response()->json([
                'message' => 'Invalid token',
            ], 401);
        }

        if ($passwordReset->token != $validated['token']) {
            return response()->json([
                'message' => 'Invalid token',
            ], 401);
        }

        $user->password = bcrypt($validated['password']);
        $user->save();

        $passwordReset->delete();

        return response()->json([
            'message' => 'Password reset successfully',
        ]);
    }
}
