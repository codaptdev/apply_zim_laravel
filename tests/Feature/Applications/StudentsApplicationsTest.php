<?php

namespace Tests\Feature\Applications;

use Tests\Classes\TestFunctionsMixin;
use Tests\TestCase;
use App\Models\School;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentsApplicationsTest extends TestCase
{
    use RefreshDatabase;
    use TestFunctionsMixin;

    public function test_students_applications_page_can_render(): void
    {
        // Create John Doe
        $this->seedJohnDoeHelper();

        // Visit The applications page
        $response = $this->get('/applications');

        $response->assertSee('Your Applications Attempts History');
        $response->assertStatus(200);

        Auth::logout();

    }

    public function test_students_can_make_application() : void {
        $school = $this->seedOneRandomSchool();

        // Create John Doe
        $seed = $this->seedJohnDoeHelper();
        $student = $seed['student'];

        // Assertions:: Check the Applications Table if its there!
        $request = $this->get('/apply?school_id=' . $school->id);
        $request->assertRedirect($school->application_url);

        $this->assertDatabaseHas('applications', [
            'student_id' => $student->id,
            'school_id' => $school->id,
        ]);

    }


    public function test_students_can_delete_appications() {

        // Arrange::
        $school = $this->seedOneRandomSchool();

        // Create John Doe
        $seed = $this->seedJohnDoeHelper();
        $student = $seed['student'];
        $user = $seed['user'];

        // Assert That Application was redirected
        $application = new Application([
            'student_id' => $student->id,
            'school_id' => $school->id,
        ]);

        $application->save();


        // Action:: Delete Application
        $request = $this->get('/applications/delete/' . $application->id);

        // Asssertion:: Check the Applications Table was deleted!
        $this->assertDatabaseMissing('applications', [
            'student_id' => $student->id,
            'school_id' => $school->id,
        ]);

    }
}
