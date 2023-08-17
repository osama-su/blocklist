<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PendingRequestController extends Controller
{
    /**
     * Show the user's registered companies.
     */
    public function index(): View
    {
        $pendingRequests = User::where('type', '!=', 'admin')
            ->where('status', 'pending')
            ->paginate(5);

        return view('pending-requests', compact('pendingRequests'));
    }

    /**
     * Approve the user's pending request.
     */
    public function approve(User $user): RedirectResponse
    {
        $user->update([
            'status' => 'approved',
        ]);

        return Redirect::route('pending-requests')
            ->with('success', 'User request approved.');
    }
}
