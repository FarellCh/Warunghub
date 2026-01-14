<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "name" => $request->name,
                "price" => $request->price,
                "qty" => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'count' => array_sum(array_column($cart,'qty'))
        ]);
    }

    public function index()
    {
        $cart = session('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function remove(Request $request)
    {
        $cart = session('cart');

        unset($cart[$request->id]);

        session()->put('cart', $cart);

        return redirect('/cart');
    }
}
