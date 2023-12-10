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

    public function user() {
        return $this->belongsTo('users');
    }

    public function profile() {
        return $this->hasOne('profiles');
    }
}
