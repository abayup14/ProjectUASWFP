<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\TipeHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hotels = Hotel::all();
        // dd($hotels);
        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $tipe_hotel = TipeHotel::all();
        $last_id = Hotel::select(DB::raw("MAX(id) as id"))
            ->get();
        $new_hotel_id = $last_id[0]->id + 1;

//        dd($new_hotel_id);
        return view("hotels.create", compact("tipe_hotel", "new_hotel_id"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $hotel = new Hotel();
        $hotel->nama = $request->get("hotel_name");
        $hotel->alamat = $request->get("hotel_address");
        $hotel->nomor_telepon = $request->get("hotel_phone");
        $hotel->email = $request->get("hotel_email");
        $hotel->rating = $request->get("hotel_rating");
        $file=$request->file("hotel_image");
        $ext = $file->getClientOriginalExtension();
        $folder = 'images/hotel';
        $filename = $request->get("hotel_id") .".".$ext;
        $file->move($folder,$filename);
        $hotel->image = $filename;
        $hotel->tipe_hotels_id = $request->get("hotel_tipe");
        $hotel->save();

        return redirect()->route("hotel.index")->with("status", "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.show', compact('hotel'));
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
    }
}
