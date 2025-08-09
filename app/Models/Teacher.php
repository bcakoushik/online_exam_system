<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'users'; // ✅ tell Laravel this model uses the users table

    protected $fillable = ['name', 'email', 'phone'];
}
