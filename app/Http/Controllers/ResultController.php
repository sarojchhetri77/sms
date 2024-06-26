<?php

namespace App\Http\Controllers;

use App\Models\result;
use Illuminate\Http\Request;
use App\Models\grade;
use App\Models\book;
use App\Models\enrollment;
use App\Models\exam;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id) 
    {  
         if(auth()->user()->role == "student"){

        $user = Auth::user(); // Get the currently authenticated user
    
        $studentId = $user->student->id;
        $results = Result::where('student_id',$studentId)->where('exam_id',$id)->with('books')->get();
            return view('backend.results.main', compact('results'));

    } 
    else{
        return "hello";
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
            $books = book::where('class_id',$class->id)->get();
            $exams = exam::all();
            return view('backend.results.create', compact('students','books','exams'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
    
        $request->validate([
            'marks'   => 'required'
        ]);
        foreach($request->marks as $studentid => $mark){
            result::create([
                'exam_id' => $request->exam,
                'student_id' => $studentid,
                'subject_id' => $request->subject,
                'marks'=> $mark,
            ]);
        }
        return redirect()->route('result.create')->with('success', 'marks added sucessfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(result $result)
    {
        
    }
}
