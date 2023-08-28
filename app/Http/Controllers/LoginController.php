<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is an admin
        $isAdmin = Auth::check() && Auth::user()->role === 'admin';

        // Get active users for regular users
        $activeUsers = User::where('status', true)->get();

        // Get deactivated users if the user is an admin
        $deactivatedUsers = $isAdmin ? User::where('status', false)->get() : collect();

        return view('user.index', compact('activeUsers', 'deactivatedUsers'));
    }

    // deactivation of user

    public function deactivateUser(Request $request, User $user)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Deactivate the user
            $user->update(['status' => false]);
            // Debug statement to check if deactivation is successful
            return redirect()->back()->with('success', 'User deactivated successfully.');
        }

        // Debug statement to check if authorization works
        return redirect()->back()->with('error', 'You are not authorized to perform this action.');
    }

    // activation of user

    public function activateUser(Request $request, User $user)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Activate the user
            $user->update(['status' => true]);
            return redirect()->back()->with('success', 'User activated successfully.');
        }

        return redirect()->back()->with('error', 'You are not authorized to perform this action.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt authentication
        if (Auth::attempt($credentials)) {
            // Check if the user is active
            if (Auth::user()->status) {
                return redirect()->route('posts.create')->with('success', 'Login Success');
            } else {
                Auth::logout(); // Log out the user if not active
                return back()->withErrors(['error' => 'Error: Your account is deactivated.']);
            }
        }

        return back()->withErrors(['error' => 'Error: Incorrect email or password']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
