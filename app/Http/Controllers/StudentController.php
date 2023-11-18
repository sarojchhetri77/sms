<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Models\enrollment;
use App\Models\grade;
use App\Models\student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $students = student::with('user','enrollment.grade')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })->orWhereHas('enrollment.grade', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })->paginate(10);
        } 
        else {

            $students =student::with('user','enrollment.grade')->paginate(10);
        }
        return view('backend.student.main', compact('students', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $classes =  grade::all();
        return view('backend.student.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['name', 'address', 'phone', 'password', 'cpassword', 'dob']);
        // storing email and password in user table or creating the user


        if ($request->password == $request->cpassword){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "student";
            $user->save();

            // storing the details of teacher in teacher table

            $student = new student();
            $student->dob = $request->dob;
            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->gender = $request->gender;
            $student->user_id = $user->id;
            $student->save();
            // code to enroll student  in class
            $enrollment = new enrollment();
            $enrollment->student_id = $student->id;
            $enrollment->class_id = $request->grade_id;
            $enrollment->save();
            return redirect()->route('student.index')->with('success', 'student created successfully');
            
        } 
        else {
            return redirect()->route('student.create')->with('failed', 'enter same password');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
         $student->delete();
         return redirect()->route('student.index');
    }
}
