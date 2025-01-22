<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.students')->with('students', Student::all());
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->phone = $request->phone;
        $student->save();

        flash()->success('Success', 'Student Record has been created successfully !');
        return redirect()->route('students.index');
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->phone = $request->phone;
        $student->save();

        flash()->success('Success', 'Student Record has been Updated successfully !');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified student from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Student $student)
    {
        $student->delete();
        flash()->success('Success', 'Student Record has been Deleted successfully !');
        return redirect()->route('students.index');
    }
}
