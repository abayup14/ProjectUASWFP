<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Product;
use App\Models\TipeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipe_produk = TipeProduct::all();
        $hotel = Hotel::all();
        $last_id = Product::select(DB::raw("MAX(id) as id"))
            ->get();
        $new_product_id = $last_id[0]->id + 1;

        return view("products.create", compact("tipe_produk", "hotel", "new_product_id"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $product = new Product();
        $product->nama = $request->get("product_name");
        $product->harga = $request->get("product_price");
        $file=$request->file("product_image");
        $ext = $file->getClientOriginalExtension();
        $folder = 'images/products';
        $filename = $request->get("product_id") .".".$ext;
        $file->move($folder,$filename);
        $product->image = $filename;
        $product->tipe_products_id = $request->get("produk_tipe");
        $product->hotels_id = $request->get("hotel_id");
        $product->save();

        return redirect()->back()->with("status", "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $deletedData = Product::find($id);
            $deletedData->delete();
            return redirect()->route("hotels.index")->with("status", "Data berhasil dihapus");
        } catch (\PDOException $ex) {
            $msg = "Failed to delete data ! Make sure there is no related data before deleting it";
            return redirect()->route('hotels.index')->with('status_error',$msg);
        }
    }
}
