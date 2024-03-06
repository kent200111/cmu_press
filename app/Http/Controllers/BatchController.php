<?php
namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\IM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('im')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->get();
        $ims = IM::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
        if (request()->ajax()) {
            return response()->json($batches);
        } else {
            return view('instructional_materials.manage_batches', compact('batches', 'ims'));
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
        $batch = new Batch([
            'im_id' => $request->input('instructional_material'),
            'name' => $request->input('name'),
            'production_date' => $request->input('production_date'),
            'production_cost' => $request->input('production_cost'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);
        $batch->save();
        return redirect()->route('batches.index');
    }
    public function show(batch $batch)
    {
    }
    public function edit($id)
    {
        $batch = Batch::findOrFail($id);
        return response()->json($batch);
    }
    public function update(Request $request, $id)
    {
        $batch = Batch::findOrFail($id);
        function formatInput(string $input): string
        {
            $input = preg_replace('/\s+/', ' ', trim($input));
            return $input;
        }
        $request['name'] = formatInput($request['name']);
        $batch->update([
            'im_id' => $request->input('instructional_material'),
            'name' => $request->input('name'),
            'production_date' => $request->input('production_date'),
            'production_cost' => $request->input('production_cost'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);
        return redirect()->route('batches.index');
    }
    public function destroy($id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();
        return response()->json(['success' => 'Batch deleted successfully.']);
    }
}