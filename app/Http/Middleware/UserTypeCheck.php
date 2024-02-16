<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeCheck
{
    /**
     * Handles an incoming request and makes sure that the
     * auth user is of the required user type, passed as the param
     * `$required_user_type`
     *
     * If the user type is not allowed, then the user will be
     *  - redirected back if their request was from our website
     *  or
     *  - redirected to the home page if their request was from an external website
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $required_user_type): Response
    {

        $our_url = url('/'); // server base route
        $req_url = $request->fullUrl();
        $is_from_origin = Str::startsWith( strtoupper($req_url), strtoupper($our_url));

        // Check if the user type is allowed to access the route

        if(auth()->user()->user_type === strtoupper($required_user_type)) {
            return $next($request);
        } else {
            if ($is_from_origin) {
                return redirect()
                ->back()
                ->with('error', $this->errorMessageHelper($required_user_type));
            } else {
                return redirect('/');
            }
        }

    }

    /** Generates an error message for the handler function if the
     * user type is not allowed to access the route
     */
    public function errorMessageHelper($user_type) {
        if (strtoupper($user_type) === 'STUDENT') {
            return 'This feature is only accessible to Students';
        } else {
            return 'This feature is only accessible to Schools';
        }
    }
}
