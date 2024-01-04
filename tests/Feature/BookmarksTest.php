<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Tests\Classes\TestFunctionsMixin;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookmarksTest extends TestCase
{

    use RefreshDatabase;
    use TestFunctionsMixin;

    public function test_students_can_render_bookmarks_page(): void
    {
        $student = $this->seedJohnDoeAndLogin()['student'];

        $response = $this->get('/bookmarks');
        $response->assertSee('Bookmarks');

        $response->assertStatus(200);

        Auth::logout();
    }

    public function test_schools_cannot_render_bookmarks_page(): void
    {
        $school = $this->seedOneRandomSchoolAndLogin();

        $this->get('/myschool');
        $response = $this->get('/bookmarks');

        $response->assertStatus(302);

        Auth::logout();
    }
}
