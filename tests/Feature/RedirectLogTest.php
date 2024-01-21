<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Classes\TestFunctionsMixin;
use Tests\TestCase;

class RedirectLogTest extends TestCase
{
    use RefreshDatabase;
    use TestFunctionsMixin;
    /**
     * A basic feature test example.
     */
    public function test_if_redirect_works( ) {

        $school = $this->seedOneRandomSchoolAndLogin();
        $url = 'https://github.com/Tadiwr';

        $request = $this->get('/redirect?url=' . $url);

        $request->assertRedirect($url);

        $this->logout();
    }

    public function test_if_redirect_log_saved () {
        $school = $this->seedOneRandomSchoolAndLogin();
        $url = 'https://github.com/Tadiwr';

        $request = $this->get('/redirect?url=' . $url);

        $this->assertDatabaseHas('redirect_logs', [
            'school_id' => $school->id,
            'to' => $url
        ]);

        $this->logout();
    }
}
