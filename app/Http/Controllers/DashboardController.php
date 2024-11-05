<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Foodscan;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $foods = Foodscan::all();
        return view('dashboard', compact('users', 'foods'));
    }
}
