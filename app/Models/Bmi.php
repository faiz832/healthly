<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bmi extends Model
{
    protected $fillable = [
        'user_id',
        'weight',
        'height',
        'bmi',
        'category',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
