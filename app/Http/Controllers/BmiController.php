<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bmi;
use Illuminate\Support\Facades\Auth;

class BmiController extends Controller
{
    public function index()
    {
        // Menampilkan semua data BMI milik user yang sedang login
        $bmis = Bmi::where('user_id', Auth::id())->latest()->get();

        return view('bmi.index', compact('bmis'));
    }

    public function create()
    {
        // Menampilkan form input BMI
        return view('bmi.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ]);

        $weight = $request->input('weight');
        $height = $request->input('height') / 100; // Konversi tinggi ke meter
        $bmi = $weight / ($height * $height);

        // Menentukan kategori BMI berdasarkan hasil
        $category = '';
        if ($bmi < 18.5) {
            $category = 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = 'Normal';
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = 'Overweight';
        } else {
            $category = 'Obese';
        }

        // Simpan data ke database
        Bmi::create([
            'user_id' => Auth::id(),
            'weight' => $weight,
            'height' => $request->input('height'),
            'bmi' => $bmi,
            'category' => $category,
        ]);

        return redirect()->route('bmi.index')->with('success', 'BMI berhasil dihitung dan disimpan.');
    }
}
