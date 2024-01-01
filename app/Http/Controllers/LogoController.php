<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function edit() {
        return view('schools.logo');
    }


    public function update(Request $request) {

        $request->validate([
            'logo' => ['required', 'mimes:png,jpg,jpeg']
        ]);

        // Grab the auth school model
        $school = School::withUserId(auth()->user()->id);

        // Store the file in the public dir in logos!
        $url = $request->file('logo')->store('logos', 'public');

        // dd($url);

        // Check if has school logo and delete if has
        if($school->logo_url !== null) {
            Storage::delete($school->logo_url);
            $school->logo_url = null;
        }

        $school->logo_url = $url;
        // update the logo_url
        $school->update();

        return redirect('/myschool')->with('message','Logo Was Successfully Updated');
    }
}
