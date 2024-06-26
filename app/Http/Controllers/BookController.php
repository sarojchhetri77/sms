<?php

namespace App\Http\Controllers;

use App\Models\assign_book;
use App\Models\book;
use App\Models\grade;
use App\Models\teacher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $books = book::whereHas('grades', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate(10);
        } else {
            $bookss = Book::doesntHave('assignteacher')->get();
            $books = book::with('grades')->paginate(10);
            $teachers = teacher::with('user')->get();
        }
        return view('backend.books.main', compact('books', 'search','teachers','bookss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $grades = grade::all();
        
        return view('backend.books.create',compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   if ($request->has('teacher_id') && $request->has('book_id')) {
           $assign = new assign_book();
           $assign->teacher_id = $request->teacher_id;
           $assign->book_id = $request->book_id;
           $assign->save();
           return redirect()->route('book.index')->with("tsuccess","teacher is assign successfully");
    }
    else{

        $book = new book();
        $book->name = $request->name;
        $book->class_id = $request->class_id;
        $book->save();
        return redirect()->route('book.create')->with('bsuccess',"book is added successfully");
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
       $book->delete();
       return  redirect()->route('book.index')->with('dsuccess','book is removed successfully');
    }
}
