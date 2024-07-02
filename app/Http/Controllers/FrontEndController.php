<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'nama' => $product->nama,
                'quantity' => 1,
                'harga' => $product->harga,
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
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
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
    public function addPoinUsed()
    {
        $poin=Auth::user()->poin;
        if (session()->get("poin_used") < $poin) {
            session()->put('poin_used', session("poin_used") + 1);
        }
    }

    public function reducePoinUsed()
    {

        if (session()->get("poin_used") > 0) {
            session()->put('poin_used', session("poin_used") - 1);
        }
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
        //     $subtotal = $c['quantity'] * $c['harga'];
        //     $total += $subtotal;
        //     $this->products()->attach($c['id'], ['quantity' => $c['quantity'], 'subtotal' => $subtotal]);
        // }
    }
}
