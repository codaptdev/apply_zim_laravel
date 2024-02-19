<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    protected $cast = [
        'user_type' => 'string'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function school() {
        return $this->hasOne(School::class);
    }

    public function student() {
        return $this->hasOne(Student::class);
    }

    /** If the user has applied to a certain school */
    public function hasAppliedTo($school_id) {

        $student = Student::withUserId($this->id);

        $applications = Application::where('school_id', $school_id)
        ->where('student_id', $student->id)
        ->get();

        return $applications->count() > 0;
    }
}
