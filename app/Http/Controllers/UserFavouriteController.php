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
        $userId = auth()->id();
        $shoeId = $request->input("shoeId");

        $existingFavorite = UserFav::where('user_id', $userId)
            ->where('shoe_id', $shoeId)
            ->first();

        if (!$existingFavorite) {
            UserFav::create([
                'user_id' => $userId,
                'shoe_id' => $shoeId
            ]);
            return redirect()->back()->with('message', 'Shoe added to favourites successfully!');
        } else {
            return redirect()->back()->with('message', 'Shoe is already in favourites!');
        }
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
