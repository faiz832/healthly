<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodScanController extends Controller
{
    public function index()
    {
        return view('scan');
    }
}