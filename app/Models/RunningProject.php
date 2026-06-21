<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'image',
        'description',
        'status'
    ];
}