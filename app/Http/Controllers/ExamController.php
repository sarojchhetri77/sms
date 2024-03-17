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
        return view('backend.exams.main', compact('exams'));
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
        $exam->status = 0;
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

        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date', 
            'status' => 'required|in:0,1',
        ]);
    
        $exam->name = $request->input('name', $exam->name);
        $exam->date = $request->input('date', $exam->date);
        $exam->status = $request->input('status', $exam->status);
    
        $exam->update();

        return redirect()->route('exam.index')->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exam $exam)
    {
        $exam -> delete();
        return redirect('exam.index');
    }
}
