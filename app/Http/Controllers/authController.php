<?php

namespace App\Http\Controllers;
use App\Models\person;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{

    function register(Request $request){
        // $register = new person;
        // $register -> email = $request -> email;
        // $register -> password = $request -> password;
        // if($register -> save()){
        //     $response = ["Message"=> "Registration successful"];
        //     return response($response, 200);
        // } else {
        //     $response = ["Message"=> "Registration failed"];
        //     return response($response, 404);
        // }

        $createuser = person::create(['email'=>$request->email, 'password'=>Hash::make($request->password)]);
        if($createuser){
            return response(['message'=>'success', 'data'=>$createuser], 200);
        }
        else{
            return response(['message'=>'failure', 'data'=>$createuser], 404);
        }

    }


    function login(Request $request){
    //     $useremail = new person;
    //     $useremail -> email = $request -> email;
    //     $useremail -> password = $request -> password;

    //       $savedCredentials = person::get();
    //       foreach($savedCredentials as $item){

    //         if($item->email == $useremail['email'] && $item->password == $useremail['password']){

    //             $response = ["Message"=> "Login successful"];
    //             return response($response, 200 );
    //             break;
    //         }
    //             else{
    //             $response = ["Message"=> "Failed to login"];
    //             return response($response, 404);

    //             }

    // }   //


    if(Auth::attempt(['email' => $request->email, 'password' =>$request->password])){


        return response(['message'=>"success", "data"=>Auth::user()],200);
    }else{
        return response(['message'=>"failure", "data"=>"Login failed"],404);
    }



    }


    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message'=>'Successfully logged out'
        ]);
    }


    public function user(Request $request){
        return response()->json($request->user());
    }

}
