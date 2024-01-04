<?php

namespace Tests\Feature\Applications;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Classes\TestFunctionsMixin;
use Tests\TestCase;

class SchoolApplicationsTest extends TestCase
{

    use RefreshDatabase;
    use TestFunctionsMixin;

    public function test_schools_application_page_can_render(): void
    {
        $this->loginRandomSchool();

        $response = $this->get('/applications');

        $response->assertSee('Application Attempts From Students');
        $response->assertStatus(200);
    }


}
