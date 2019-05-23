<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){

        return \App\Service::all();

    }
    
    public function store(Request $request){

        $data = $request->validate([
            'name'      => 'required|string|max:32',
            'tipodeservicos'     => 'required|string|max:64',
            'valor'  => 'required|double|min:6|max:24',
            'formadepagamento'  => 'required|string|min:6|max:24',
            'codigo'  => 'required|string|min:6|max:24',
            'localizacao'  => 'required|double|min:6|max:24',
        ]);

        $data['codigo'] = bcrypt($data['codigo']);
        return \App\Service::create($data);

    }
    public function update(Request $request){}
        
    public function destroy(Request $request){}
}
