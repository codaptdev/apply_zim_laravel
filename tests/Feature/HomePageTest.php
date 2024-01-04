<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_home_page_renders(): void
    {
        $response = $this->get('/');

        if(auth()->guest()) {
            $response->assertRedirect('/guest');
        } else {
            $response->assertRedirect('/home');
        }

    }

}
