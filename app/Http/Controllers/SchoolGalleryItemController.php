<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolGalleryItemController extends Controller
{
    // Get a grid of a schools gallery items
    public function index() {
        return view('gallery.index');
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
