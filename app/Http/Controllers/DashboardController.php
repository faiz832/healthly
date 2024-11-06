<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bmi;
use App\Models\Foodscan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $foods = Foodscan::where('user_id', $user->id)->latest()->get();
        $bmis = Bmi::where('user_id', $user->id)->latest()->take(1)->get();

        return view('dashboard', compact('user', 'foods', 'bmis'));
    }
}
