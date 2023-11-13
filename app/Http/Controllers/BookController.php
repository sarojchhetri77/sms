<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\grade;
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
            $books = book::whereHas('grade', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate(10);
        } else {
            $books = book::with('grade')->paginate(10);
        }
        return view('backend.books.main', compact('books', 'search'));
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
    {
        $book = new book();
        $book->name = $request->name;
        $book->class_id = $request->class_id;
        $book->save();
        return redirect()->route('book.index');

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
        //
    }
}
