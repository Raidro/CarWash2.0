<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        $users = $user::when(!empty($request->name), function ($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->name.'%');
        })->when(!empty($request->email), function ($query) use ($request) {
            return $query->where('email', 'like', '%'.$request->email.'%');
        })->latest();
        return $users->paginate();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request, User $user)
    {     
        $data = $request->validate([
            'name'      => 'required|string|max:32',
            'email'     => 'required|string|max:64',
            'password'  => 'required|string|min:6|max:24',
        ]);
        $data['password'] = bcrypt($data['password']);
        return $user::create($data);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:32',
            'email'     => 'required|string|max:64',
            'password'  => 'required|string|min:6|max:24',
        ]);
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return response($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }
}
