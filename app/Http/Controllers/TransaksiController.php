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
    public function listTransaksi()
    {
        //
        if (Auth::user()->role == "Pelanggan") {
            $transaksis = Transaksi::all()->where("pelanggans_id", "=", Auth::user()->id);
        } else {
            $transaksis = Transaksi::all();
        }
        return view("transaksis.list_transaksi", compact('transaksis'));
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
        $this->authorize('pelanggan', Auth::user());
        //
        $cart = session()->get('cart');
        $total = 0;
        $poin_tambah = 0;
        $totalNonPremium = 0;
        foreach ($cart as $item) {
            $total += $item["quantity"] * $item["harga"];
            if ($item["tipe"] == "Deluxe" || $item["tipe"] == "Superior" || $item["tipe"] == "Suite") {
                $poin_tambah += $item["quantity"] * 5;
            } else {
                $totalNonPremium += $item["quantity"] * $item["harga"];
            }
        }
        $poin_tambah += floor($totalNonPremium / 300000);

        $data = new Transaksi();
        $data->tanggal = date('Y-m-d H:i:s');
        $data->pelanggans_id = Auth::user()->id;
        $data->total_sebelum = $total;
        $data->total_sesudah_pajak = $total * 111 / 100;
        $data->poin_terpakai = session()->get('poin_used', 0);
        $data->total_bayar = $data->total_sesudah_pajak - session('poin_used', 0) * 100000;
        $data->save();
        $data->insertProducts($cart);

        $user = User::find(Auth::user()->id);
        if ($user->member == "Member") {
            $user->poin -= session()->get('poin_used');
            $user->poin += $poin_tambah;
            $user->save();
        }

        session()->forget('cart');
        session()->forget('poin_used');
        if ($poin_tambah > 0 && $user->member == "Member") {
            return redirect()->route('hotel')->with('status', 'Horray ! Your data is successfully recorded ! You got ' . $poin_tambah . " point!");
        } else {
            return redirect()->route('hotel')->with('status', 'Horray ! Your data is successfully recorded !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $transaksi = Transaksi::find($id);
        return view('transaksis.show', compact('transaksi'));
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
