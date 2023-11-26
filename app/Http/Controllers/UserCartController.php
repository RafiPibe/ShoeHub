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
}
