<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request){

        return \App\Location::all();
    }

    public function store(Request $request){

        $data = $request->validate([
            'lat'      => 'required|float|max:12',
            'lng'     => 'required|float|max:12',
                    
        ]);

        return \App\Location::create($data);
    }

    public function update(Request $request){}

    public function destroy(){}
}
