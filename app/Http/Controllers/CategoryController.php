<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
        if (request()->ajax()) {
            return response()->json($categories);
        } else {
            return view('instructional_materials.manage_categories', compact('categories'));
        }
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        function formatInput(string $input): string
        {
            $input = preg_replace('/\s+/', ' ', trim($input));
            return $input;
        }
        $request['name'] = formatInput($request['name']);
        $request['description'] = $request->input('description') ? formatInput($request->input('description')) : null;
        $category = new Category([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $category->save();
        return redirect()->route('categories.index');
    }
    public function show(Category $category)
    {
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        function formatInput(string $input): string
        {
            $input = preg_replace('/\s+/', ' ', trim($input));
            return $input;
        }
        $request['name'] = formatInput($request['name']);
        $request['description'] = $request->input('description') ? formatInput($request->input('description')) : null;
        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully.']);
    }
}