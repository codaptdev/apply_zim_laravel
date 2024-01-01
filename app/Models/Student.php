<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Relationship with the user account that create the student account
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relationship with the applications that the student has made
    public function applications() {
        return $this->hasMany(Application::class);
    }
}
