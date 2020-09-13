<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use Hash;
use App\User;

use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function register(Request $request){
      $validator = Validator::make($request->all(), [
        'email' => 'required|email|unique:users',
        'name' => 'required|string|max:50',
        'password' => 'required'
    ]);
     
    if ($validator->fails()) {
        return $validator->errors()->toJson();
     
    }else{
        $data = $request->all();
        $res= User::all();
       $res= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return $res->toJson();
    }

    }
    public function details(Request $request){
        return $request->user();
    }
       
    


}
