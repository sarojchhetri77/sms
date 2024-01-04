<?php

namespace App\Http\Controllers;

use App\Models\result;
use Illuminate\Http\Request;
use App\Models\grade;
use App\Models\book;
use App\Models\enrollment;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            return view('backend.results.create', compact('students','books'));
        } else {
            return redirect()->route('home');
        }
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
        //
    }
}
