<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\School;
use App\Models\Student;
use App\Models\Bookmark;
use App\Models\Application;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the bookmarks.
     */
    public function index()
    {
        $student = Student::withUserId(auth()->user()->id);
        $bookmarks = Bookmark::forStudentWithId($student->id);

        return view("students.bookmarks", compact("bookmarks"));
    }

    /**
     * #### Store a newly created bookmark in storage.
     *
     *  - The `$schoolId` parameter is used to determine which
     *  school is being bookmarked.
     *
     *  - It is passed as a query param
     *  - e.g /bookmarks?schoolId=1
     */
    public function store(Request $request, $school_id)
    {
        $student = Student::withUserId(auth()->user()->id);
        $school = School::find($school_id);


        $bookmark = new Bookmark;

        $bookmark->school_id = $school->id;
        $bookmark->student_id = $student->id;

        try {
            $bookmark->saveOrFail();
            return redirect()->back()->with('message', $school->name . ' was successfully bookmarked');
        } catch (Throwable $th) {
            return redirect()->back()->withError('Something wrong happened, Please try again');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($school_id)
    {
        $student = Student::withUserId(auth()->user()->id);
        $school = School::find($school_id);

        try {
            Bookmark::findAndDelete($school_id, $student->id);
            return redirect()->back()->with('message', $school->name . ' was removed from Bookmarks');

        } catch (Throwable $e) {
            return redirect()->back()->withError("Bookmark could not be removed because it doesn't exist");
        }

    }
}
