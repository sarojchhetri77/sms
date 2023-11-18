<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreRequest;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $teachers = Teacher::with('user')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })->paginate(10);
        } else {

            $teachers = Teacher::with('user')->paginate(10);
        }
        return view('backend.teachers.main', compact('teachers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherStoreRequest $request)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['name', 'address', 'phone', 'password', 'cpassword', 'dob', 'hired',]);
        // storing email and password in user table or creating the user


        if ($request->password == $request->cpassword){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "teacher";
            $user->save();

            // storing the details of teacher in teacher table

            $teacher = new teacher();
            $teacher->dob = $request->dob;
            $teacher->address = $request->address;
            $teacher->phone = $request->phone;
            $teacher->gender = $request->gender;
            $teacher->hired_at = $request->hired;
            $teacher->user_id = $user->id;
            $teacher->save();
            return redirect()->route('teacher.index')->with('success', 'Teacher created successfully');
        } 
        else {
            return redirect()->route('teacher.create')->with('failed', 'enter same password');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher $teacher)
    {   
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success','teacher deleted successfully');
    }
}
