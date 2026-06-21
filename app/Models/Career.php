<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'department',
        'location',
        'experience',
        'vacancy',
        'description',
        'status'
    ];
}
