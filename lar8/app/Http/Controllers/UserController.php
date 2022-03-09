<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
                'users' => $users
        ]);
    }

    public function store(UserRequest $request)
    {

        User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
        ]);

        return back();
    }

    public function destroy(User $user)
    {
            $user->delete();

            return back();
    }
}
