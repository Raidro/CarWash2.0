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
            'lat'      => 'required|double|max:64',
            'lng'     => 'required|double|max:64',
                    
        ]);

        return \App\Location::create($data);
    }

    public function update(Request $request){}
    public function destroy(Request $request){}
}
