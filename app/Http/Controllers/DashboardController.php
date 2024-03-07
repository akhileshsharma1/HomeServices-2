<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Example logic: Fetch data from the database
        $userData = auth()->user(); // Assuming you're using Laravel's built-in authentication

        // Pass the data to the view
        return view('dashboard', ['userData' => $userData]);
    }
}
