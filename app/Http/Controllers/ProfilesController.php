<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profiles.show',compact('user'));
    }
    public function edit(User $user){

        if(auth()->user()->isNot($user)){
            abort(404);
        }
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user){
        $attributes = request()->validate([
            'username'=> ['string','max:255','alpha_dash','required'],
            'name'=> ['string','max:255','required'],
            'email'=> ['string','required',Rule::unique('users')->ignore($user),],
            'password'=>['required','required','min:8','confirmed'],
            'avatar'=>['file']

        ]);
        if(request('avatar')){
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);
        return redirect($user->path());
    }
}
