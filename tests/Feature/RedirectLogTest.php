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

    private $redirect_url = 'https://github.com/Tadiwr';
    public function test_if_redirect_works( ) {

        $school = $this->seedOneRandomSchoolAndLogin();
        $req_url = 'redirect?type=website&school_id=' . $school->id . '&url=' . $this->redirect_url;

        $request = $this->get($req_url);

        $request->assertRedirect($this->redirect_url);

        $this->logout();
    }

    public function test_if_redirect_log_saved () {
        $school = $this->seedOneRandomSchoolAndLogin();

        $req_url = 'redirect?type=website&school_id=' . $school->id . '&url=' . $this->redirect_url;

        $request = $this->get($req_url);

        $this->assertDatabaseHas('redirect_logs', [
            'school_id' => $school->id,
            'to' => $this->redirect_url
        ]);

        $this->logout();
    }
}
