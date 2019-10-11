<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['show', 'product']);
    }
    public function index()
    {
        $service = DB::table('services')->get();
        return view('services.index', ['services' => $service]);
    }
    
    public function show($id)
    {
        $service = DB::table('services')
            ->where('id', $id)
            ->first();
        return view('services.show')->with('service', $service);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'model' => 'required',
            'description' => 'required',
            'price' => 'required',
            ]);
            $service = new Service();
            $service->name = $request->name;
            $service->model = $request->model;
            $service->description = $request->price;
            $service->price = $request->price;
            $service->save();
            return back()->with('success', 'You created successfully.');
    }

    public function edit($id)
    {
        $service = DB::table('services')
            ->where('id', $id)
            ->first();
    	return view('services.edit')->with('service', $service);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'model' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        DB::table('services')->where('id', $request->id)->update([
            'name' => $request->name,
            'model' => $request->qty,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return back()->withSuccess('Update Successful!');
    }

    public function service()
    {
        $service = DB::table('services')->get();

        return view('service', ['services' => $service]);
    }

    public function destroy($id)
    {
        DB::table('services')->where('id', $id)->delete();
    	return redirect('/services');
    }
}
