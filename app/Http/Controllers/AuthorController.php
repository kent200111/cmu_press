<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $authors = Author::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
            return response()->json($authors);
        } else {
            $authors = Author::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
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
        return redirect()->route('authors.index');
    }
    public function show(Author $author)
    {
    }
    public function edit(Author $author)
    { 
        return response()->json($author);
    }
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('authors.index');
    }
    public function destroy(Author $author)
    {
    }
}