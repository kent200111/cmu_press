<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $authors = Author::all();
            return response()->json($authors);
        } else {
            $authors = Author::all();
            return view('instructional_materials.manage_authors', ['authors' => $authors]);
        }
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $author = new Author();
        $author->first_name = $request->input('first_name');
        $author->middle_name = $request->input('middle_name');
        $author->last_name = $request->input('last_name');
        $author->save();
        return redirect()->route('author.index');
    }







    public function show(Author $author)
    {
        return view('instructional_materials.show_author', ['author' => $author]);
    }
    public function edit(Author $author)
    {
        return view('instructional_materials.edit_author', ['author' => $author]);
    }
    public function update(Request $request, Author $author)
    {
        $author->save();
        return redirect()->route('author.index')->with('success', 'Author updated.');
    }
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'Author deleted.');
    }
}