<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index() {
    $outlet = Outlet::all();

    return view('outlet.index', ['outlet' => $outlet]);
    }

    function upload() {
        return view("outlet.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'outletName' => 'required|string',
            'outletLocation' => 'required|string',
            'outletOwner' => 'required|string',
        ], [
            'shoeName.required' => 'Shoe name can\'t be empty!',
            'outletLocation.required' => 'Outlet location can\'t be empty!',
            'outletOwner.required' => 'Outlet owner can\'t be empty!',
        ]);

        Outlet::create([
            'outletName' => $request->outletName,
            'outletLocation' => $request->outletLocation,
            'outletOwner' => $request->outletOwner,
        ]);

        return redirect('/outlet');
    }
}
