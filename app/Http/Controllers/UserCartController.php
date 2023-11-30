<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Models\UserCart;

class UserCartController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id(); // Get current user's ID

        UserCart::create([
            'user_id' => $userId,
            'shoe_id' => $request->input("shoeId")
        ]);

        return redirect()->back()->with('message', 'Shoe added to cart successfully!');
    }

    public function showCart()
    {
        $userId = auth()->id();
        $cartItems = UserCart::where('user_id', $userId)->with('shoe')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->shoe->shoePrice;
        });

        return view('cart.index', ['cartItems' => $cartItems, 'total' => $total]);
    }

    public function remove($id)
    {
        UserCart::destroy($id);
        return redirect()->back()->with('message', 'Item removed from cart successfully!');
    }


    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }
}
