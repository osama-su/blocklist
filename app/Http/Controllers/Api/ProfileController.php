<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json([
            'data' => auth()->user()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'email' => 'sometimes|unique:users,email,' . auth()->id(),
            'password' => 'sometimes',
            'registration_number' => 'sometimes',
            'commercial_name' => 'sometimes',
            'industry' => 'sometimes',
            'phone_number' => 'sometimes',
            'national_address' => 'sometimes',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        auth()->user()->update($validated);

        return response()->json([
            'data' => auth()->user()
        ]);

    }

}
