<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function fullScreenMenu(Request $request ) {
        return view('components.full-menu', [
            'prev' => $request->headers->get('referer'),
        ]);
    }

    public function navigateBack(Request $request ) {
        return redirect($request->headers->get('referer'));
    }

}
