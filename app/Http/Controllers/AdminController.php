<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Latetime;
use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Lecture;


class AdminController extends Controller
{

 
    public function index()
    {
        //Dashboard statistics 
       
        $totalStu =  count(Student::all());
        $totalLec =  count(Lecture::all());
        
        $data = [$totalStu,$totalLec];
        
        return view('admin.index')->with(['data' => $data]);
    }

}
