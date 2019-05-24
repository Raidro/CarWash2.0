<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request, Service $service){


        return \App\Service::all();

    }
    
    public function show(Service $service)
    {
        return $service; // so mostra o usuario sem a necessidade do findorfail
    }


    public function store(Request $request, Service $service){

        $data = $request->validate([
            'name'      => 'required|string|max:32',
            //'tipodeservicos'     => 'required|string|max:64',
            'valor'  => 'required|double|min:6|max:24',
            //'formadepagamento'  => 'required|string|min:6|max:24',
            'codigo'  => 'required|string|min:6|max:24',
            'localizacao'  => 'required|float|min:6|max:12',
        ]);

        $data['codigo'] = bcrypt($data['codigo']);
        return $service::create($data);

    }
    public function update(Request $request, Service $service){

        $data = $request->validate([
            'name'      => 'required|string|max:32',
            //'tipodeservicos'     => 'required|string|max:64',
            'valor'  => 'required|double|min:6|max:24',
            //'formadepagamento'  => 'required|string|min:6|max:24',
            'codigo'  => 'required|string|min:6|max:24',
            'localizacao'  => 'required|float|min:6|max:12',
        ]);

        $data['codigo'] = uniqid();
        $service->update($data);
        return response($service, 200);

    }

    public function destroy(Service $service){
        $service->delete();
        return response(null, 204);
    }
}
