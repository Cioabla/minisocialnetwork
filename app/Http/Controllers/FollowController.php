<?php

namespace App\Http\Controllers;

use Auth;
use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index($id){

        $follow = new Follow();
        $follow->user_id = $id;
        $follow->follow_id = Auth::user()->id;
        $follow->save();

        return response()->json($id);
    }

    public function remove($id){

        $follow = Follow::where('user_id',$id);
        $follow->delete();

        return response()->json($id);
    }

    public function my(){
        $followed = Follow::where('follow_id',Auth::id())->get();

        return view('user.follow',compact('followed'));
    }
}
