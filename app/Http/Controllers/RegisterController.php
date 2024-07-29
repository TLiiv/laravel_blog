<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>['required','max:255','min:3'],
            'password' => ['required','max:255','min:7'],
            'email' => ['required','email','max:255','min:3'],
            'username' => ['required','max:255','min:3']
        ]);

        // $attributes['password'] = bcrypt($attributes['password']);
        User::create($attributes);

        return redirect('/');
    }
}
