<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileVisit extends Model
{
    use HasFactory;

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }
}
