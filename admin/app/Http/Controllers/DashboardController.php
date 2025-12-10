<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Example: fetch dynamic stats
        // $totalUsers = User::count();
        // $totalOrders = Order::count();
        // $totalCourses = Course::count();

        // Pass data to view
        return view('dashboard');
    }
}
