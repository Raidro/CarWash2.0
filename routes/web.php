<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Index', function () {
    return \App\User::all();
    // return \App\User::find(1);
    // return [
    //     'nome' => 'Icaro',
    //     'sobrenome' => 'Scherma',
    // ];
});

Route::post('/cadastro', function(\Illuminate\Http\Request $request) {
    $data = $request->validate([
        'name'      => 'required|string|max:32',
        'email'     => 'required|string|max:64',
        'password'  => 'required|string|min:6|max:24',
    ]);
    
    $data['password'] = bcrypt($data['password']);
    return \App\User::create($data);
});

Route::get('/location', function () {
    
    return \App\GPS::all();
    
});
