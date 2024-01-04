<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Tests\Classes\TestFunctionsMixin;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{

    use RefreshDatabase;
    use TestFunctionsMixin;

    public function test_that_guest_users_home_page_renders(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/guest');
    }

    public function test_that_students_home_page_renders() : void {
        $student = $this->seedJohnDoeAndLogin();

        $request = $this->get('/home');

        $request->assertSee($student['student']->first_name);

        Auth::logout();
    }


    public function test_that_schools_home_page_renders() : void {
        $school = $this->loginRandomSchool();

        $request = $this->get('/myschool');

        $request->assertSee($school->name);

        Auth::logout();

    }

    public function test_students_are_redirect_to_home_from_index() : void {
        $student = $this->seedJohnDoeAndLogin();

        $request = $this->get('/');
        $request->assertRedirect('/home');

        Auth::logout();
    }

    public function test_schools_are_redirect_to_myschool_from_index() : void {
        $school = $this->loginRandomSchool();

        $request = $this->get('/');
        $request->assertRedirect('/myschool');

        Auth::logout();
    }

}
