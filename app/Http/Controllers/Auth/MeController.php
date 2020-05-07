<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Dues;
use App\Profile;

class MeController extends Controller
{
   
     public function __construct()
    {
      $this->middleware(["auth:api"]);
    }


    public function me(Request $request)
    {
        // return response()->json(auth()->user());
        $user = $request->user();
        return response()->json([
            'email' => $user->email,
            'firstname' => $user->name,
            'firstname' => $user->firstname,
            'surname' => $user->surname,
            'isAdmin' => $user->is_admin,
            'userid' => $user->id

        ]);
    }

    public function getAllUsers()
    {
      return response()->json(User::all());
    }

    public function  getAllDues()
    {
       return response()->json(Dues::all());
    }

    public function countusers()
    {
       return response()->json(User::count());
    }

    public function updaterole(Request $request, $id)
    {
       $user = User::find($id);
       $user->is_admin = $request->is_admin;
       $user->save();
       return response()->json(["success" => 200]);

    }

    public function getUser(Request $request)
    {
      $user = auth()->user()->profile;
      return response()->json($user);
    }

    public function updateuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'gender' => ['required','string'],
          'dob' => ['required','string'],
          'disability' => ['required','string'],
          'occupation' => ['required','string'],
          'marital' => ['required','string'],
          'religion' => ['required','string']
       ]);

       if($validator->fails())
        {   
          sleep(2);
         return response()->json(['errors' => $validator->errors()]);
        }
         
          $user = $request->all();
          //return $user;
       //$user = auth()->user()->profile;
        //return auth()->user()->profile;
       auth()->user()->profile->update($user);

       sleep(3);
       return response()->json(["success" =>200]);
      
    }

    public function getAllUserDues()
    {
       $user = auth()->user()->dues;
       return response()->json($user);
    }

    public function deleteUser($userid)
    {
       User::destroy($userid);
       return response()->json(["deleted" =>200]);
    }

    public function Userupdate(Request $request)
    {
          $validator = Validator::make($request->all(), [
          'firstname' => ['required','string'],
          'surname' => ['required','string'],
          'mobile' => ['required','string','min:10','max:10'],
          'email' => ['required','string','email','unique:users'],
          
       ]);
  
       if($validator->fails())
        {   
          sleep(1);
         return response()->json(['errors' => $validator->errors()]);
        }
       $user = $request->all();
       User::where("id", Auth::user()->id)->update($user);
       

       sleep(3);
       return response()->json(["success"]);
    }

    public function getSingleUser()
    {
        $user = auth()->user();
       return response()->json($user);
    }

    public function getUserProfile()
    {
        $user = auth()->user()->profile;
       return response()->json($user);
    }

    public function uploadPicture(Request $request)
    {
         $validator = Validator::make($request->all(), [
          'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
       ]);
  
       if($validator->fails())
        {   
          sleep(1);
         return response()->json(['errors' => $validator->errors()]);
        }
        $image = request()->file("image");
        $imageName = $image->getClientOriginalName();
        $imageName = time(). "_" .$imageName;
        $image->move(public_path("/photos"), $imageName);
        $img = ["picture" =>"/images" . $imageName];
          
        //DB::table("profiles")->where("user_id", Auth::user()->id)->update(["picture" =>$imageName]);
        // $user->profile->picture = $img;//"images/".$imageName;
         //auth()->user()->profile();
         // $user->save();
        //User::where("id", Auth::user()->id)->update($user);
         Profile::where("user_id", Auth::user()->id)->update(["picture" => $imageName]);
         sleep(2);
         return response()->json(["success"]);
    }

    public function getAvatar()
    {
       $picture =  auth()->user()->profile->picture;
       return response()->json($picture);
    }

     public function getUserDetails($userid)
     {
        $user = User::where("id", $userid)->get();
       return response()->json($user[0]);
     }

     public function getUserDetailsTwo($userid)
     {
        $user = Profile::where("user_id", $userid)->get();
       return response()->json($user[0]);
     }

     public function CreateUser(Request $request)
     {

       $validator = Validator::make($request->all(), [
          'firstname' => ['required','string'],
          'surname' => ['required', 'string'],
          'mobile' => ['required' ,'unique:users','min:10', 'max:10'],
          'email' => ['required', 'unique:users','email'],
          'password' => ['required', 'min:6'],
          'is_admin' => ['required']
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
}
