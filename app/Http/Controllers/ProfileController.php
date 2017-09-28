<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{


    public function profile($username)
    {
        $user = User::whereUsername($username)->first();


        $isFollow = Follow::where('user_id',Auth::id())->where('follow_id' , $user->id)->count();

        return view('user.profile',compact('user','isFollow'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit',compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $user->update($request->all());

        return redirect('/profile/'.Auth::user()->username);
    }
}
