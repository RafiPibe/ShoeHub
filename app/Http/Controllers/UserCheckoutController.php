<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Models\UserCart;
use App\Models\UserOrderDetail;

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

    // function storeOrderDetails(Request $request)
    // {
    //     $request->validate([
    //         'shipping_address' => 'required|string',
    //         'postal_code' => 'required|string',
    //         'city' => 'required|string',
    //         'province' => 'required|string',
    //         'country' => 'required|string',
    //         'payment_method' => 'required|string',
    //         'phone_number' => 'required|string',
    //         'card_number' => 'required|string',
    //         'expiry_date' => 'required|string',
    //         'cvv' => 'required|string',
    //     ], [
    //         'shipping_address.required' => 'Shipping address can\'t be empty!',
    //         'postal_code.required' => 'Postal code can\'t be empty!',
    //         'city.required' => 'City can\'t be empty!',
    //         'provi publicnce.required' => 'Province can\'t be empty!',
    //         'country.required' => 'Country can\'t be empty!',
    //     ]);

    //     $userId = auth()->id();

    //     $orderDetails = new UserOrderDetail([
    //         'user_id' => $userId,
    //         'shipping_address' => $request->input('shipping_address'),
    //         'postal_code' => $request->input('postal_code'),
    //         'city' => $request->input('city'),
    //         'province' => $request->input('province'),
    //         'country' => $request->input('country'),
    //         'payment_method' => $request->input('payment_method'),
    //         'phone_number' => $request->input('phone_number'),
    //         'card_number' => $request->input('card_number'),
    //         'expiry_date' => $request->input('expiry_date'),
    //         'cvv' => $request->input('cvv'),
    //     ]);

    //     $orderDetails->save();

    //     return redirect()->route('checkout');
    // }
}
