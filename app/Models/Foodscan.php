<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodscan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'foodImage', 'analysis', 'formattedAnalysis'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
