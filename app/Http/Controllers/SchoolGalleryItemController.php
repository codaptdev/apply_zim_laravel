<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolGalleryItemController extends Controller
{
    // Get a grid of a schools gallery items
    public function index($school_id) {

        $school = School::all()->firstOrFail('id', $school_id);

        return view('gallery.index', [
            'school' => $school
        ]);
    }

    // Returns view to upload a gallery item
    public function create() {
        return view('gallery.create');
    }

    // Returns view to edit gallery items
    public function edit() {
        return view('gallery.edit');
    }
}
