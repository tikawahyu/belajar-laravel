<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate(20); //Book -> model
        return view('pages.book.index', compact('books'));
    }

    public function create(){
        return view('pages.book.create');
    }
    //proses tambah data
    public function store(Request $request){
        $validated = $request->validate([
            'judul' => ['required'],
            'tanggal_terbit' => ['required'],
            'jumlah_halaman' => ['required'],
            'cover' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);
        Book::create($validated);
        return redirect()->route('book.index')->with('success', 'Berhasil Ditambahkan');
    }
    //tombol edit
    public function edit($id){
        $book = Book::find($id);
        return view('pages.book.edit', compact('book'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'judul' => ['required'],
            'tanggal_terbit' => ['required'],
            'jumlah_halaman' => ['required'],
        ]);

        //untuk upload image
        if($request->file('cover')){
            $image = $request->file('cover');
            $validated['cover'] = $image->storeAs('public/books', $image->hashName());
        }
        Book::find($id)->update($validated);
        return redirect()->route('book.index')->with('success', 'Berhasil diperbarui');
    }

    //tombol delete
    public function destroy($id){
        Book::find($id)->delete();
        return redirect()->route('book.index')->with('success', 'Berhasil dihapus');
    }

}
