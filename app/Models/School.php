<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{

    use HasFactory;

    public function searchLike(string $search) {
        return $this->where("name","LIKE","%". $search ."%")
        ->get();
    }

    /** Returns a filtered list of schools
     *
     * If the `$key` param is an empty string it will return all schoools
     */
    public function filter(string $key = '', string $value = '') {

        if($key == '') {
            $student = Student::withUserId(auth()->user()->id);
            return $this->all()->where('level', $student->level)->shuffle();
        } else {
            return $this->all()->where($key, $value)->shuffle();
        }
    }

    // Relationship with the user account that created the school account
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Refference to applications for made by students
    public function applications() {
        return $this->hasMany(Application::class);
    }

    public static function withUserId(int $user_id) {
        return self::all()
        ->where("user_id", $user_id)
        ->first();
    }
}
