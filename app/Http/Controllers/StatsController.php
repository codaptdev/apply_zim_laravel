<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    // Get all the stats for a school
    public function index() {
        return view('stats.index');
    }
}
