<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\Outlet;

class ShoeController extends Controller
{
    public function index() {
        $shoe = Shoe::all();
        $outlet = Outlet::all();

        return view('shoe.index', ['shoe' => $shoe, 'outlet' => $outlet]);
    }

    public function previewindex() {
        $shoes = Shoe::take(3)->get();
        return view('home', compact('shoes'));
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('shoe.index', compact('outlet'));
    }

    public function show() {
        $shoe = Shoe::all();
        $outlet = Outlet::all();

        return view('shoe.show', ['shoe' => $shoe]);
    }

    public function details($id) {
        $shoe = Shoe::find($id);
        return view('shoe.details', ['shoe' => $shoe]);
    }

    public function imageToBase64($imagePath) {
        try {
            $imageData = file_get_contents($imagePath);
            if ($imageData === false) {
                throw new Exception("Failed to read the image file.");
            }

            $base64Encoded = base64_encode($imageData);
            return $base64Encoded;
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
            return null;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'shoeName' => 'required|string',
            // 'rating' => 'required',
            'shoeSize' => 'required|integer',
            // 'outlet_id' => 'required',
            'shoeImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'shoePrice' => 'required|numeric',
        ], [
            'shoeName.required' => 'Shoe name can\'t be empty!',
            // 'rating.required' => 'Rating can\'t be empty!',
            'shoeSize.required' => 'Shoe Size can\'t be empty!',
            // 'outlet_id.required' => 'outlet can\'t be empty!',
            'shoeImage.required' => 'Image can\'t be empty!',
            'shoePrice.required' => 'Price can\'t be empty!',
        ]);

        $image = $request->file('shoeImage');
        $imageName = $image->getClientOriginalName();

        if ($image) {
            $imageBase64 = base64_encode(file_get_contents($image));
        } else {
            $imageBase64 = null; // or any default value you want to use
        }

        Shoe::create([
            'shoeName' => $request->shoeName,
            'shoeSize' => $request->shoeSize,
            // 'outlet_id' => $request->outlet_id,
            'outletId' => 1,
            'shoeImage' => $imageBase64,
            'shoePrice' => $request->shoePrice,
        ]);

        return redirect('/show');
    }
}
