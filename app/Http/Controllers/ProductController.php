<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['show', 'product']);
    }
    public function index()
    {
        $product = DB::table('products')->orderBy('qty', 'ASC')->where('qty', '>', '0')->get();
        $runout = DB::table('products')->where('qty', '=', '0')->get();
        return view('products.index', ['products' => $product], ['runouts' => $runout]);
    }
    
    public function show($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();
        return view('products.show')->with('product', $product);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // var_dump($request->time);
        $validatedData = $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'time' => 'required',
            'itemcode' => 'required',
            ]);
            $product = new Product();
            $product->name = $request->name;
            $product->qty = $request->qty;
            $product->price = $request->price;
            $product->time = $request->time;
            $product->itemcode = $request->itemcode;
            $product->save();
            return back()->with('success', 'You created successfully.');
    }

    public function edit($id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->first();
    	return view('products.edit')->with('product', $product);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
        ]);

        return back()->withSuccess('Update Successful!');
    }

    public function product()
    {
        $product = DB::table('products')->get();

        return view('product', ['products' => $product]);
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
    	return redirect('/product');
    }
}
