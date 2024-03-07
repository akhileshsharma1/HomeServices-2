<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceProvider;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'registeras' => 'required',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);


        // Create a new user instance
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        // Set the user type according to the selected option
        $user->utype = $request->input('registeras');

        // Save the user record
        $user->save();

        if ($user->utype === 'SVP') {
            $serviceProvider = new ServiceProvider();
            $serviceProvider->user_id = $user->id;
            // Populate other fields as needed
            $serviceProvider->save();
        }

        // Redirect the user after registration
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
