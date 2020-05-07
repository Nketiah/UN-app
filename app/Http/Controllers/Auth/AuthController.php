<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;



class AuthController extends Controller
{
    
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'firstname' => ['required','string'],
          'surname' => ['required', 'string'],
          'mobile' => ['required' ,'unique:users','min:10', 'max:10'],
          'email' => ['required', 'unique:users','email'],
          'password' => ['required', 'min:6']
       ]);
         
        if($validator->fails())
        {   
          sleep(2);
         return response()->json(['errors' => $validator->errors()]);
        }
        
         
        $user = $request->all();
        $user["password"] = bcrypt($user["password"]);
        User::create($user);
        sleep(2);
        return response()->json(["success" => 200]);

    }

    public function login(Request $request)
    {
       if(!$token = auth()->attempt($request->only("email", "password")))
      {
        sleep(2);
        return response(["error" => "Unauthorized"], 401);
      }
      return response()->json(["token" => $token]);

    }

   public function changePassword(Request $request)
   {
     if(!Hash::check($request->get("oldpassword"), Auth::user()->password))
     {
       return response()->json(["oldpassword" =>"Your current password does not match with what you provided"]);
     }
     if(strcmp($request->get("oldpassword"), $request->get("newpassword")) == 0)
     {
       return response()->json(["newerror" => 500]);
     }

     $validator = Validator::make($request->all(), [
          'oldpassword' => ['required'],
          'newpassword' => ['required', 'min:6','string']
       ]);
      if($validator->fails())
        {   
         
         return response()->json(['errors' => $validator->errors()]);
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get("newpassword"));
        $user->save();
        return response()->json(["success" => 200]);
   }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }
}
