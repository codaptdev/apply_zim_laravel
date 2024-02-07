<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectLog extends Model
{
    use HasFactory;

    public function school() {
        return $this->belongsTo(School::class);
    }

    /** Gets all the redirects for a certain school and
     * returns the count of those logs
     */
    public static function getSchoolsRedirectsCounts($school_id) {
        $logs = static::all()->where('school_id', $school_id);

        return $logs->count();
    }
}
