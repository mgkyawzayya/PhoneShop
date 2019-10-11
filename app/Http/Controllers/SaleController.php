<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sale;
use DB;

class SaleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['show', 'product']);
    }
    public function index()
    {
        $sale = DB::table('sales')->get();
        return view('sales.index', ['sales' => $sale]);
    }
    
    public function show($id)
    {
        $sale = DB::table('sales')
            ->where('id', $id)
            ->first();
        return view('sales.show')->with('sale', $sale);
    }

    public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'qty' => 'required',
            'itemcode' => 'required',
            'time' => 'required',
            ]);

            $product = DB::table('products')
            ->where('itemcode', $request->itemcode)
            ->first();

            $qty = $product->qty - $request->qty;

            if($qty >= 0 )
            {
                DB::table('products')->where('itemcode', $request->itemcode)->update([
                    'qty' => $qty,
                ]);
                $sale = new Sale();
                $sale->name = $product->name;
                $sale->qty = $request->qty;
                $sale->price = $request->qty * $product->price;
                $sale->time = $request->time;
                $sale->itemcode = $request->itemcode;
                $sale->save();
                return back()->with('success', 'You created successfully.'); 
            }
            else {
                return back()->with('success', 'Your Qty is not enough.');
            }
                           
    }

    public function edit($id)
    {
        $sale = DB::table('sales')
            ->where('id', $id)
            ->first();
    	return view('sales.edit')->with('sale', $sale);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'qty' => 'required',
            'itemcode' => 'required',
        ]);
        DB::table('sales')->where('id', $request->id)->update([
            'qty' => $request->qty,
            'itemcode' => $request->itemcode,
        ]);
        
        return back()->withSuccess('Update Successful!');
    
    }

    public function sale()
    {
        $sale = DB::table('sales')->get();

        return view('sales.index', ['sales' => $sale]);
    }

    public function destroy($id)
    {
        DB::table('sales')->where('id', $id)->delete();
    	return redirect('/');
    }
}

