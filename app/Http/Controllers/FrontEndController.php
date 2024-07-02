<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (!isset($cart[$id])) {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'photo' => $product->image,
            ];
        } else {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah ditambahkan ke Cart");
    }


    public function addQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        $product = Product::find($cart[$id]['id']);
        if (isset($cart[$id])) {
            $jumlahAwal = $cart[$id]['quantity'];
            $jumlahPesan = $jumlahAwal + 1;
            if ($jumlahPesan < $product->available_room) {
                $cart[$id]['quantity']++;
            } else {
                return redirect()->back()->with('error', 'Jumlah pemesanan melebihi total kamar yang tersedia');
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }

    public function reduceQuantity(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 0) {
                $cart[$id]['quantity']--;
            }
        }
        session()->forget('cart');
        session()->put('cart', $cart);
    }



    public function deleteFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->forget('cart');
        session()->put('cart', $cart);
        return redirect()->back()->with("status", "Produk Telah dibuang dari Cart");
    }
    public function checkout()
    {
        // $cart = session('cart');
        // $user = Auth::user();
        // $t = new Transaction();
        // $t->user_id = $user->id;
        // $t->customer_id = 1; //need to fix later
        // $t->transaction_date = Carbon::now()->toDateTimeString();
        // $t->save();
        // //insert into junction table product_transaction using eloquent
        // $t->insertProducts($cart, $user);
        // session()->forget('cart');
        // return redirect()->route('laralux.index')->with('status', 'Checkout berhasil');
    }
    public function insertProducts($cart, $user)
    {
        // $total = 0;
        // foreach ($cart as $c) {
        //     # code...
        //     $subtotal = $c['quantity'] * $c['price'];
        //     $total += $subtotal;
        //     $this->products()->attach($c['id'], ['quantity' => $c['quantity'], 'subtotal' => $subtotal]);
        // }
    }
}
