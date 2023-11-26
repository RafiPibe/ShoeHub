<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;

class UserCartController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id(); // Get current user's ID
        $shoeId = $request->shoeId; // Get shoe ID from the request

        // Create a new record in the user_cart table
        UserCart::create([
            'user_id' => $userId,
            'shoe_id' => $shoeId,
        ]);

        return redirect()->back()->with('message', 'Shoe added to cart successfully!');
    }
}
