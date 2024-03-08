<?php
namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\IM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy(DB::raw('COALESCE(updated_at, created_at)'), 'desc')->get();
        $ims = IM::with('batches')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->get();
        if (request()->ajax()) {
            return response()->json($purchases);
        } else {
            return view('sales_management.purchase_history', compact('purchases', 'ims'));
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
        $request['customer_name'] = formatInput($request['customer_name']);
        $purchase = new Purchase([
            'customer_name' => $request->input('customer_name'),
            'im_id' => $request->input('instructional_material'),
            'batch_id' => $request->input('im_batch'),
            'quantity' => $request->input('quantity'),
            'date_sold' => $request->input('date_sold'),
        ]);
        $purchase->save();
        return redirect()->route('purchases.index');
    }
}