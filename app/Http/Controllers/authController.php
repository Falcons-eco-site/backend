<?php

namespace App\Http\Controllers;
use App\Models\person;

use Illuminate\Http\Request;

class authController extends Controller
{
     
    function register(Request $request){
        $register = new person;
        $register -> email = $request -> email;
        $register -> password = $request -> password;
        if($register -> save()){
            $response = ["Message"=> "Registration successful"];
            return response($response, 200);
        } else {
            $response = ["Message"=> "Registration failed"];
            return response($response, 404);
        }
        
    }


    function login(Request $request){
        $useremail = new person;
        $useremail -> email = $request -> email;
        $useremail -> password = $request -> password;
        
          $savedCredentials = person::get();
          foreach($savedCredentials as $item){
               
            if($item->email == $useremail['email'] && $item->password == $useremail['password']){
                
                $response = ["Message"=> "Login successful"];
                return response($response, 200 );
                break;
            }
                else{
                $response = ["Message"=> "Failed to login"];
                return response($response, 404);
               
                }
               
    }   // foreach

    
     
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
