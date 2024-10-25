<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $books = Book::all();
       return view('books.index', compact('books'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('books.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
         'title' => 'required',
         'author' => 'required',
         'publisher' => 'required',
         'year' => 'required|digits:4',
       ]);
       
       Book::create($request->all());
       
       return redirect()->route('books.index')->with('success', 'Buku ditambah');//
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('books.edit', compact('book'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|digits:4',
        ]);

        // Mengupdate data buku
        $books->update($request->all());

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $books)
    {
        $books->delete();

        return redirect()->route('books.index')->with('success', 'Buku dihapus');
        //
    }
}