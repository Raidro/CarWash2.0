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

// // Route::get('/Index', function () {
// //     return \App\User::all();
    
// //     // return \App\User::find(1);
// //     // return [
// //     //     'nome' => 'Icaro',
// //     //     'sobrenome' => 'Scherma',
// //     // ];
// // });

// Route::post('/cadastro', function(\Illuminate\Http\Request $request) {
//     $data = $request->validate([
//         'name'      => 'required|string|max:32',
//         'email'     => 'required|string|max:64',
//         'password'  => 'required|string|min:6|max:24',
//     ]);
    
//     $data['password'] = bcrypt($data['password']);
//     return \App\User::create($data);
// });

// // Route::get('/location', function () {
    
// //     return \App\Location::all();
    
// // });

// Route::post('/location', function(\Illuminate\Http\Request $request) {
//     $data = $request->validate([
//         'lat'      => 'required|double|max:64',
//         'lng'     => 'required|double|max:64',
        
//     ]);
    
//     return \App\User::create($data);
// });


// Route::post('/client', function(\Illuminate\Http\Request $request) {
//     $data = $request->validate([
//         'name'      => 'required|string|max:32',
//         'tipodeservicos'     => 'required|string|max:64',
//         'valor'  => 'required|double|min:6|max:24',
//         'formadepagamento'  => 'required|string|min:6|max:24',
//         'codigo'  => 'required|string|min:6|max:24',
//         'localizacao'  => 'required|double|min:6|max:24',
//     ]);
    
//     $data['codigo'] = bcrypt($data['codigo']);
//     return \App\Client::create($data);
// });

// Route::get('/client', function () {
//     return \App\Client::all();
       
// });

// Route::post('/services', function(\Illuminate\Http\Request $request) {
//     $data = $request->validate([
//         'name'      => 'required|string|max:32',
//         'tipodeservicos'     => 'required|string|max:64',
//         'valor'  => 'required|double|min:6|max:24',
//         'formadepagamento'  => 'required|string|min:6|max:24',
//         'codigo'  => 'required|string|min:6|max:24',
//         'localizacao'  => 'required|double|min:6|max:24',
//     ]);
    
//     $data['codigo'] = bcrypt($data['codigo']);
//     return \App\Service::create($data);
// });

// Route::get('/services', function () {
//     return \App\Service::all();
       
// });
// //======================================================//
// //exemplo de como pegar informações da url
// //Route::get('/teste', function(Request $request){
// //    dd($_GET);
// //});
// //
// //======================================================//


Route::resource('user', 'UserController');
Route::resource('service', 'ServiceController');
Route::resource('location', 'LocationController');
//Route::resource('client', 'ClientController');

// Route::get('payment-types', function () {
//     return [
//         'data' => App\Service::PAYMENT_TYPES
//     ];
// });

// Route::get('service-types', function () {
//     return [
//         'data' => App\Service::SERVICE_TYPES
//     ];
// });