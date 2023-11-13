<?php

namespace App\Http\Controllers;

use App\Models\grade;
use App\Models\teacher;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $classes = grade::whereHas('teacher', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate(10);
        } else {
            $classes = Grade::with('teacher.user')->paginate(10);
        }
        return view('backend.grades.main', compact('classes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = teacher::with('user')->get();
        return view('backend.grades.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'section' => 'max:255'
        ]);

        $grade = new grade();
        $grade->name = $request->name;
        $grade->section = $request->section;
        $grade->teacher_id = $request->teacher_id;
        $grade->save();
        return redirect()->route('grade.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(grade $grade)
    {
      $grade->delete();
      return redirect()->route('grade.index');
    }
}
