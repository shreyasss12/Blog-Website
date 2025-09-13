<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function loginPage()
    {
        return view('login-page.login-page');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (!Auth::guard('web')->attempt($credentials)) {
                return redirect()->back()->withErrors(['error' => 'Invalid login credentials.']);
            }

            return redirect()->route('blogs.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred during login.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('front.end.index');
    }

    public function registerPage()
    {
        return view('login-page.register-page');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ]);

        try {
            $register = new User();
            $register->name = $request->first_name . ' ' . $request->last_name;
            $register->email = $request->email;
            $register->password = Hash::make($request->password);
            $register->save();

            return redirect()->route('login');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors(['error' => $e]);
        }
    }

    public function update(Request $request)
    {
        $user = auth('web')->user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'public');
            $user->profile_image = $path;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
