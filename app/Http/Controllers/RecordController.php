<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Record;
use DB;

class RecordController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['show', 'product']);
    }
    public function index()
    {
        $product = DB::table('products')->get();
        return view('records.index', ['sales' => $product]);
    }
    
    public function show($id)
    {
        $record = DB::table('products')
            ->where('id', $id)
            ->first();
        return view('records.show')->with('record', $record);
    }
}
