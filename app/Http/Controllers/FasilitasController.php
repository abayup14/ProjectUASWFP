<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Product;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rs = Fasilitas::all();
        return view("fasilitas.index", compact("rs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::all();
        return view('fasilitas.formcreate', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Fasilitas();
        $data->nama = $request->get("fasilitas_name");
        $data->deskripsi = $request->get("fasilitas_price");
        $data->products_id = $request->get("fasilitas_product");
        $data->save();
        return redirect()->route('fasilitas.index')->with('status', 'Horray ! Your data is successfully recorded !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        //
    }
}
