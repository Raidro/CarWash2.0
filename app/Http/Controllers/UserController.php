<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        return \App\User::all();

    }
    public function store(Request $request){

         
            $data = $request->validate([
                 'name'      => 'required|string|max:32',
                 'email'     => 'required|string|max:64',
                 'password'  => 'required|string|min:6|max:24',
             ]);
                
             $data['password'] = bcrypt($data['password']);
             return \App\User::create($data);
         
            
       
    }
    public function update(Request $request){}
    public function destroy(){}
}
