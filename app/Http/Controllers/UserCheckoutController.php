<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Models\UserCart;

class UserCheckoutController extends Controller
{
    public function showItems()
    {
        $userId = auth()->id();
        $cartItems = UserCart::where('user_id', $userId)->with('shoe')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->shoe->shoePrice;
        });

        return view('checkout.index', ['cartItems' => $cartItems, 'total' => $total]);
    }
}
