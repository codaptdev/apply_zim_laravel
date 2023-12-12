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
        // Check if the key param is empty
        $student = Student::find(auth()->user()->id);

        if($key == '') {
            return $this->all()->where('level', $student->level);
        } else {
            return $this->all()->where($key, $value);
        }
    }

    public function user() {
        return $this->belongsTo('users');
    }

    public function profile() {
        return $this->hasOne('profiles');
    }
}
