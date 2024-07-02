<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rs = Transaksi::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cart = session()->get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item["quantity"] * $item["harga"];
        }


        $data = new Transaksi();
        $data->tanggal = date('Y-m-d H:i:s');
        $data->pelanggans_id = Auth::user()->id;
        $data->total_sebelum = $total;
        $data->total_sesudah_pajak = $total * 111 / 100;
        $data->poin_terpakai = session()->get('poin_used');
        $data->total_bayar = $data->total_sesudah_pajak - session('poin_used', 0) * 100000;
        $data->save();
        $data->insertProducts($cart);

        $user = User::find(Auth::user()->id);
        $user->poin -= session()->get('poin_used');
        $user->save();

        session()->forget('cart');
        session()->forget('poin_used');
        return redirect()->route('hotel')->with('status', 'Horray ! Your data is successfully recorded !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
