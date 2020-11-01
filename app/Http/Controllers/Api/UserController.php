<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success]); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

public function register(Request $request){
   $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           ]);
       $data = new User;
       $data->name=$request->name;
       $data->email=$request->email;
       $data->password=Hash::make($request->password);
       $data->save();
      // $success['token'] =  $data->createToken('MyApp')-> accessToken; 
       //$success['name'] =  $data->name;

     return response()->json('success'); 

       
    }

    public function UserDetails(){
    	$UserDetails = Auth::user();
       return response()->json(['success'=>$UserDetails]); 

    }
}
