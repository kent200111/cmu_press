<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
        if (request()->ajax()) {
            return response()->json($authors);
        } else {
            return view('instructional_materials.manage_authors');
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
        return response()->json($author);
    }
    public function edit(Author $author)
    { 
        return response()->json($author);
    }
    public function update(Request $request, Author $author)
    {
        $author->update([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
        ]);
        return redirect()->route('authors.index');
    }
    public function destroy(Author $author)
    {
    }
}