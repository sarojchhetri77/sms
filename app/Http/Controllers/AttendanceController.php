<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\enrollment;
use App\Models\grade;
use App\Models\student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $auth_id = auth()->user()->teacher->id;
        $class = grade::where('teacher_id',$auth_id)->first();
        if($class){

            $students = enrollment::where('class_id', $class->id)->with('student.user')->get();
            return view('backend.attendance.create',compact('students'));
        }
        else{
            return redirect()->route('home');
        }
      
//         $auth_id = auth()->user()->teacher->id;
// $class = Grade::where('teacher_id', $auth_id)->first();

// if ($class) {
//     $studentsInClass = Enrollment::where('class_id', $class->id)
//         ->with('student.user') // Eager load the relationships
//         ->get(); // Execute the query to retrieve results

//     return view('backend.attendance.create', compact('studentsInClass'));
// } else {
//     // Handle the case where the class is not found
//     // You might want to redirect or show an error message here
// }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attendance $attendance)
    {
        //
    }
}
