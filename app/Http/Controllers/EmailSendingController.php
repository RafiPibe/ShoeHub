<?php

namespace App\Http\Controllers;

use App\Mail\OrderCheckoutMail;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
}
