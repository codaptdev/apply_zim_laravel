<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'surname',
        'town_city',
        'level',
        'user_id',
    ];

    // Relationship with the user account that create the student account
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relationship with the applications that the student has made
    public function applications() {
        return $this->hasMany(Application::class);
    }

    public static function withUserId(int $user_id) {
        return self::all()
        ->where("user_id", $user_id)
        ->first();
    }
}
