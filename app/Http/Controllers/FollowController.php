<?php

namespace App\Http\Controllers;

use Auth;
use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index($id){

        $follow = new Follow();
        $follow->user_id = Auth::user()->id;
        $follow->follow_id = $id;
        $follow->save();

        return response()->json($id);
    }

    public function remove($id){

        $follow = Follow::where('follow_id',$id);
        $follow->delete();

        return response()->json($id);
    }
}
