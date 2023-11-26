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
        $shoeId = $request->shoeId; // Get shoe ID from the request

        if ($shoeId === null) {
            // Log an error message and return
            Log::error('shoeId is NULL');
            return redirect()->back()->with('error', 'Failed to add shoe to cart');
        }

        // Create a new record in the user_cart table
        UserCart::create([
            'user_id' => $userId,
            'shoe_id' => $shoeId,
        ]);

        return redirect()->back()->with('message', 'Shoe added to cart successfully!');
    }
}
