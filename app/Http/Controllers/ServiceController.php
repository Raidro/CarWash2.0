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
            'tipodeservicos'     => 'required|int|max:10',
            'valor'  => 'required|float|max:12',
            'formadepagamento'  => 'required|int|max:10',
            'codigo'  => 'required|string|max:16',
            //'localizacao'  => 'required|float|min:6|max:12',
        ]);

        $data['codigo'] = bcrypt($data['codigo']);
        return $service::create($data);

    }
    public function update(Request $request, Service $service){

        $data = $request->validate([
            'name'      => 'required|string|max:32',
            'tipodeservicos'     => 'required|int|max:10',
            'valor'  => 'required|float|max:12',
            'formadepagamento'  => 'required|int|max:10',
            'codigo'  => 'required|string|max:16',
            //'localizacao'  => 'required|float|min:6|max:12',
        ]);

        $data['codigo'] = uniqid();
        $service->update($data);
        return response($service, 200);

    }

    public function destroy(Service $service){
        $service->delete();
        return response(null, 204);
    }

    public function paymentTypes(Service $service){

        return [
            'data' => App\Service::PAYMENT_TYPES
        ];
    }

    public function serviceTypes(Service $service){
        return [
            'data' => App\Service::SERVICE_TYPES
        ];

    }
}
