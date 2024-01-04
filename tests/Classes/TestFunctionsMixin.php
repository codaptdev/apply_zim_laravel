<?php

namespace Tests\Classes;

use App\Models\User;
use App\Models\School;
use App\Models\Student;
use Exception;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\Auth;

/** Trait with useful reusable code for testing  */
trait TestFunctionsMixin {
    public  function seedJohnDoeAndLogin() {
        $user = new User([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' =>  '12345678',
            'user_type' => 'STUDENT'
        ]);

        $user->save();

        if($this->loginJohnDoe()) {
            $student = new Student([
                'user_id' => $user->id,
                'first_name' => 'John',
                'surname' => 'Doe',
                'email' => 'john@example.com',
                'level' => 'SECONDARY',
                'town_city' => 'Harare'
            ]);

            $student->save();

        } else {
            print("💀 Couldn't create Student User John Doe");
        }

        return [
            'user' => $user,
            'student' => $student
        ];
    }

    public function loginJohnDoe() : bool {
        return (Auth::attempt(['email' => 'john@example.com', 'password' => '12345678']));
    }

    public function seedOneRandomSchool() : School {
        return School::factory()->createOne();
    }

    public function seedOneRandomSchoolAndLogin() : School {
        $school = School::factory()->createOne();
        Auth::loginUsingId($school->user_id);

        return $school;
    }

    public function loginRandomSchool() : School {
        $school = School::factory()->createOne();
        $loginCreds = ['email' => $school->email, 'password' => '12345678'];

        if (!Auth::attempt($loginCreds)) {
            throw new Exception("💀 Couldn't login to school");
        }

        return $school;
    }

    public function seedJohnDoeAndLogout() {
        $seed = $this->seedJohnDoeAndLogin();
        Auth::logout();

        return $seed;

    }

}
