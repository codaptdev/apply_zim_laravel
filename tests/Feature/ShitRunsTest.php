<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShitRunsTest extends TestCase
{

    private $test_user = [
        'email' => 'tester1@codapt.com',
        'password' => '12345678',
    ];

    /**
     * A basic feature test example.
     */
    public function test_if_unauth_users_are_redirected(): void
    {
        Auth::logout();
        $response = $this->get('/');
        $response->assertRedirect('/guest');

    }

    public function test_if_login_page_loads() : void {
        $request = $this->get('auth/signin');
        $request->assertStatus(200);
    }

    public function test_if_login_route_works() : void {
        $request = $this->post('auth/signin', $this->test_user);
        $request->assertRedirect('/home');
    }

    public function tests_if_auth_users_are_redirected() : void {
        if (Auth::attempt($this->test_user)) {
            $reponse = $this->get('/');
            $reponse->assertRedirect('/home');
        }
    }

}
