<?php

namespace App\Http\Controllers;

use App\Mail\OrderCheckoutMail;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Shoe;
use App\Models\UserOrderDetail;

class EmailSendingController extends Controller
{
    public function sendEmailOnContinue(Request $request)
    {
        $cartItems = UserCart::where('user_id', auth()->id())->with('shoe')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->shoe->shoePrice;
        });

        Mail::to(auth()->user()->email)->send(new OrderCheckoutMail($cartItems, $total));

        return redirect()->route('checkout')->with('status', 'Email sent successfully');
    }

    // public function sendEmailOnContinue(Request $request)
    // {
    //     $cartItems = UserCart::where('user_id', auth()->id())->with('shoe')->get();
    //     $total = $cartItems->sum(function ($item) {
    //         return $item->shoe->shoePrice;
    //     });
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

    //     Mail::to(auth()->user()->email)->send(new OrderCheckoutMail($cartItems, $total, $orderDetails));

    //     return redirect()->route('checkout')->with('status', 'Email sent successfully');
    // }
}
