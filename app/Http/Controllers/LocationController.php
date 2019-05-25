<?php

namespace App\Http\Controllers;

use \App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request, Location $location){

        return $location::all();
    }

    public function show(Location $location)
    {
        return $location; // so mostra o usuario sem a necessidade do findorfail
    }


    public function store(Request $request, Location $location){

        $data = $request->validate([
            'lat'      => 'required|float|max:12',
            'lng'     => 'required|float|max:12',
                    
        ]);

        return $location::create($data);
    }

    public function update(Request $request, Location $location){

        $data = $request->validate([
            'lat'      => 'required|numeric|max:12',
            'lng'     => 'required|numeric|max:12',
                    
        ]);
        $location->update($data);
        return response($location, 200);

    }

    public function destroy(Location $location){

        $location->delete();
        return response(null, 204);
    }
}
