<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\SchoolGalleryItem;
use Illuminate\Support\Facades\Auth;

class SchoolGalleryItemController extends Controller
{


    // Get a grid of a schools gallery items
    public function index($school_id) {

        try {
            $school = School::all()->firstOrFail('id', $school_id);
            $gallery_items = $school->gallery_items;
            return view('gallery.index', [
                'school' => $school,
                'gallery_items' => $gallery_items
            ]);
        } catch (\Throwable $th) {
            return view('schools.404', [
                'isId' => true,
                'nameOrId' => $school_id,
            ]);
        }

    }

    // Returns view to upload a gallery item
    public function create() {
        return view('gallery.create');
    }

    // Returns view to edit gallery items
    public function edit() {

        $school = School::withUserId(Auth::user()->id);
        $gallery_items = School::withUserId(Auth::user()->id)->gallery_items;

        return view('gallery.edit', [
            'gallery_items' => $gallery_items
        ]);
    }

    public function save(Request $request) {

        $request->validate([
            'gallery_item' => ['mimes:png,jpg,jpeg', 'required', 'max:3000']
        ]);

        $url = $request->file('gallery_item')->store('gallery_items', 'public');
        $school = School::withUserId(Auth::user()->id);

        $gallery_item = new SchoolGalleryItem();
        $gallery_item->url = $url;
        $gallery_item->school_id = $school->id;
        $gallery_item->des = '';

        $gallery_item->save();

        return redirect('gallery/edit',);

    }
}
