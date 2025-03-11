<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
    use HasFactory;

    protected $fillable = ['username', 'email', 'feedback', 'file'];
    
    protected $casts = [
        'file' => 'binary' // Ensure binary storage
    ];
}
