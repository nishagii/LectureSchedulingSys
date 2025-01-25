<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    
    public function index()
    {
        return view('admin.students')->with('students', Student::all());
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
            'phone' => 'nullable|string|max:12',
        ]);

        $phone = $request->phone;
        if ($phone){
            $phone = str_replace('+94', '', $phone);
            $phone = ltrim($phone, '0');
            $phone = '+94' . $phone;
        }

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->phone = $phone;
        $student->save();

        flash()->success('Success', 'Student Record has been created successfully !');
        return redirect()->route('students.index');
    }

    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required|string|max:255',
            'phone' => 'nullable|string|max:12|regex:/^\+94\d+$/',
        ]);

        $phone = $request->phone;
        if ($phone){
            $phone = str_replace('+94', '', $phone);
            $phone = ltrim($phone, '0');
            $phone = '+94' . $phone;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->course = $request->course;
        $student->phone = $phone;
        $student->save();

        flash()->success('Success', 'Student Record has been Updated successfully !');
        return redirect()->route('students.index');
    }

    
    public function destroy(Student $student)
    {
        $student->delete();
        flash()->success('Success', 'Student Record has been Deleted successfully !');
        return redirect()->route('students.index');
    }
}
