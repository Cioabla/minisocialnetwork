<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class ImageController extends Controller
{
    public function index(){
        $images = Image::where('user_id',Auth::id())->get();


        return response()->json($images);

    }

    public function save(){
        Image::make(Input::file('photo'))->resize(300, 200)->save('public/foo.jpg');


    }
}
