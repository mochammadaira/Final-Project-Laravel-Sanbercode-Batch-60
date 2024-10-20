<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Books;
use File;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('books.displayBooks', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('books.tambahBooks', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'category_id' => 'required',
        ]);

        $fileName = time().'.'.$request->image->extension();
        
        $request->image->move(public_path('uploads'), $fileName);

        $books = new Books;

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stock = $request->input('stock');
        $books->image = $fileName;
        $books->category_id = $request->input('category_id');

        $books->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);

        return view('books.detailBooks', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Books::find($id);
        $categories = Categories::get();
        
        return view('books.editBooks', compact('books', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'category_id' => 'required',
        ]);

        $books = Books::find($id);

        if($request->has('image')) {
            
            //hapus file lama
            File::delete('uploads/'. $books->image);

            //mengubah nama file manjadi unique
            $fileName = time().'.'.$request->image->extension();

            //tempat penyimpanan file
            $request->image->move(public_path('uploads'), $fileName);

            $books->image = $fileName;

        }

        $books->title = $request['title'];
        $books->summary = $request['summary'];
        $books->stock = $request['stock'];
        $books->category_id = $request['category_id'];
        $books->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        
        File::delete('uploads/'. $books->image);

        $books->delete();

        return redirect('/books');
    }
}
