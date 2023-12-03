<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Models\UserFav;

class UserFavouriteController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id(); // Get current user's ID

        UserFav::create([
            'user_id' => $userId,
            'shoe_id' => $request->input("shoeId")
        ]);

        return redirect()->back()->with('message', 'Shoe added to favourites successfully!');
    }

    public function showFav()
    {
        $userId = auth()->id();
        $favourites = UserFav::where('user_id', $userId)->with('shoe')->get();

        return view('favourites.index', ['favourites' => $favourites]);
    }

    // public function shoe()
    // {
    //     return $this->belongsTo(Shoe::class);
    // }

}
