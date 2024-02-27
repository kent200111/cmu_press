<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    public function manageAuthors()
    {
        return view('instructional_materials.manage_authors');
    }
    public function fetchAuthors()
    {
        $authors = Author::all();
        return response()->json($authors);
    }
    public function addAuthor(Request $request)
    {
        $author = new Author();
        $author->first_name = $request->input('first_name');
        $author->middle_name = $request->input('middle_name');
        $author->last_name = $request->input('last_name');
        $author->save();
        return redirect()->route('authors.manage');
    }
}