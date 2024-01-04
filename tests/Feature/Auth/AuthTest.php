<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Tests\Classes\TestFunctionsMixin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{

    use RefreshDatabase;
    use TestFunctionsMixin;

    public function test_guest_users_are_redirected_to_login_on_auth_pages() : void {
        Auth::logout();

        $request = $this->get('/home');
        $request->assertRedirect('/auth/signin');

        $request = $this->get('/myschool');
        $request->assertRedirect('/auth/signin');

    }

    public function test_student_sign_in () : void {
        $seed = $this->seedJohnDoeAndLogout();
        $student = $seed['student'];

        $request = $this->post('/auth/signin', [
            'email' => $student->email,
            'password' => '12345678'
        ]);

        if ( auth()->guest()) {
            $this->fail('Falied to Sign In');
        }

        $request->assertRedirect('/home');

        Auth::logout();
    }

    public function test_school_sign_in () : void {
        Auth::logout();
        $school = $this->seedOneRandomSchool();

        $request = $this->post('/auth/signin', [
            'email' => $school->email,
            'password' => '12345678'
        ]);

        if ( auth()->guest()) {
            $this->fail('Falied to Sign In');
        }

        $request->assertRedirect('/myschool');

        Auth::logout();
    }

    public function test_sign_out_for_schools() : void {
        $school = $this->seedOneRandomSchoolAndLogin();

        $request = $this->get('/auth/signout');
        $request->assertRedirect('/auth/signin');

        $this->assertEquals(auth()->guest(), true);
    }

    public function test_sign_out_for_students() : void {
        $school = $this->seedJohnDoeAndLogin();

        $request = $this->get('/auth/signout');
        $request->assertRedirect('/auth/signin');

        $this->assertEquals(auth()->guest(), true);
    }
}
