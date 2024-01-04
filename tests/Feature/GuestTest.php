<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_guests_can_render_about(): void
    {
        Auth::logout();
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_guests_can_render_register(): void
    {
        Auth::logout();
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_guests_can_render_guest_home_page(): void
    {
        Auth::logout();
        $response = $this->get('/guest');

        $response->assertStatus(200);
    }
}
