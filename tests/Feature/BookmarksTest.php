<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookmarksTest extends TestCase
{
    private $student_test_user = [
        'email' => 'tester1@codapt.com',
        'password' => '12345678',
    ];

    private $school_test_user = [
        'email' => 'tester1@codapt.com',
        'password' => '12345678',
    ];

    // Logins in student test user
    private function loginStudent() {
        return Auth::attempt($this->student_test_user);
    }

    private function failTest($reason = '') {
        print($reason);
        $this->assertEquals(false, true);
    }

    private function getSchoolTestId () {
        $id = 0;

        if($this->loginSchool()) {
            $school = School::withUserId(Auth::user()->getAuthIdentifier());
            $id = $school->id;

        } else {
            $this->failTest('Could not login as school user');
        }

        Auth::logout();

        return $id;
    }
    private function loginSchool() {
        return Auth::attempt($this->school_test_user);
    }

    public function test_if_bookmarks_page_loads(): void
    {
        print('Logging in as student user...');

        if($this->loginStudent()) {

            print('Visiting Student Bookmarks route');

            $response = $this->get('/bookmarks');
            $response->assertStatus(200);
        }

    }

}
