<?php

namespace App\Http\Controllers;

use App\Models\RedirectLog;
use Illuminate\Http\Request;

class RedirectLogController extends Controller
{
    /** Takes a destination url as a param and redirects
     * to it after logging the redirect */
    public function index(Request $request) {
        // make new log
        // save log

        $log = new RedirectLog();

        $log->school_id = $request->school_id;
        $log->type = $request->type;
        $log->to = $request->url;
        $log->save();

        return redirect()->to($request->url);
    }
}
