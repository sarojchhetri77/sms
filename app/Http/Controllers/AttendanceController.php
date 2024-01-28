<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use App\Models\enrollment;
use App\Models\grade;
use App\Models\student;
use App\Models\teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function record(){
        $uid = auth()->user()->id;

        if (auth()->user()->role == "teacher") {
            $teacher = Teacher::where('user_id', $uid)->first();
        
            if ($teacher) {
                $attendances = $teacher->attendance()->with('student', 'grade')->get();
        
                return view('backend.attendance.view', compact('attendances'));
            }
        }
        
    
        
    }


    public function index(request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            if(auth()->user()->role == "admin"){

                $attendances = Attendance::with('grade', 'teacher', 'student')->where('date', $search)->get();
                $classes = $attendances->groupBy('class_id');
                return view('backend.attendance.main', compact('search','classes'));
            }
           if(auth()->user()->role == "teacher"){
                $uid = auth()->user()->id;
                $teacher=teacher::where('user_id',$uid)->first();
                $class = grade::where('teacher_id',$teacher->id)->first();
                $attendances = Attendance::with('grade', 'teacher', 'student')->where('date', $search)->where('class_id',$class->id)->get();
                return view('backend.attendance.main', compact('search','attendances'));
        
           }
        } 
        else {
           $attendances = [];
            $classes = [];
            $search = [];
            return view('backend.attendance.main', Compact('classes','search','attendances'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth_id = auth()->user()->teacher->id;
        $class = grade::where('teacher_id', $auth_id)->first();
        if ($class) {
            $students = enrollment::where('class_id', $class->id)->with('student.user')->get();
            return view('backend.attendance.create', compact('students'));
        } else {
            return redirect()->route('home');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = Carbon::now()->format('Y-m-d');
        $auth_id = auth()->user()->teacher->id;
        $class_id = grade::where('teacher_id', $auth_id)->first();

        $data = Attendance::whereDate('date', $date)
            ->where('class_id', $class_id->id)
            ->first();

        if ($data !== null) {
            return redirect()->route('attendance.create')->with('status', 'Attendance already taken!');
        } else {
            $request->validate([

                'attendences'   => 'required'
            ]);
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'present') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
                    $attendence_status = false;
                }

                Attendance::create([
                    'class_id' => $class_id->id,
                    'teacher_id' => $auth_id,
                    'student_id' => $studentid,
                    'date' => $date,
                    'status' => $attendence_status
                ]);
            }
            return redirect()->route('attendance.create')->with('success', 'attendance created sucessfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(attendance $attendance)
    {
    
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

