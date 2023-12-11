<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'about',
        'body',
        'webiste_url',
        'application_url',
        'instagram',
        'twitter',
        'facebook',
        'banner_url',
        'application_process',
        'tuition_max',
        'tuition_min',

    ];

    public function school() {
        return $this->belongsTo(School::class);
    }
}
