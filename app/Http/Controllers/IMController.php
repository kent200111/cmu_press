<?php
namespace App\Http\Controllers;

use App\Models\IM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IMController extends Controller
{
    public function index()
    {
        $ims = IM::with('authors', 'category')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->get();
        if (request()->ajax()) {
            return response()->json($ims);
        } else {
            return view('instructional_materials.manage_masterlist', compact('ims'));
        }
    }
}