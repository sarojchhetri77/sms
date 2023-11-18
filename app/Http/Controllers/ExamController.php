<?php

namespace App\Http\Controllers;

use App\Models\exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = exam::paginate(10);
        return view('backend.exams.main',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $exam = new exam();
        $exam->name = $request->name;
        $exam->date = $request->date;
        $exam->save();
        return redirect()->route('exam.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exam $exam)
    {
        //
    }
}
