<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;


class UserController extends Controller{
// get all users
    public function getAllUsers(){
        $users=User::all();
        return response()->json([
            "status" => "success",
            "users" => $users
        ],200);


    } 
//get the restaurants
    public function getAllRestaurants(){
        $restaurants=Restaurant::all();
        return response()->json([
            "status" => "success",
            "restaurants" => $restaurants
        ],200);


    } 
//add restaurant
    public function addRestaurant(Request $request){
        $res_name = $request->rname;
        $img = $request->photo;
        $descript = $request->desc;
        $res = new Restaurant;
        $res->r_name=$res_name;
        $res->photo=$img;
        $res->description=$descript;
        $res->save();
        return response()->json([
            "status" => "success"],200);
}
//sign up
    public function addUser(Request $request){
        $user = new User;
        $user->F_name=$request->fname;
        $user->L_name=$request->lname;
        $user->Type=$request->type;
        $user->Email=$request->email;
        $user->Password=hash('sha256', $request->pass);
        $user->save();
        return response()->json([
            "status" => "success"],200);
    }
    //edit profile
     public function editProfile(Request $request){
         User::where("id",$request->id)->update(['F_name'=>$request->fname],['L_name'=>$request->lname]);
         return response()->json([
             "status" => "success"],200);
     }
     //get user by id
     public function getUserById(Request $request){
        $id = $request->id;
        $user = User::find($id);
        return response()->json([
            "status" => "Success",
            "user" => $user,
        ]);
    }
    //login
    public function userLogin(Request $request){
        // $email = User::find($request->email);
        // $password = User::find($request->password);
        $email = $request->email;
        $password = $request->pass;
        $user = User::where('Email',  $email)->first();//https://www.codegrepper.com/code-examples/php/laravel+if+user+not+exist
        if ($user === null){
            return response()->json([
                "status" => "User not found",
            ]);
        }if ($password == $user->Password){
            return response()->json([
                "status" => "Success",
                "user_id" => $user->id,
            ]);
        }else{
            return response()->json([
                "status" => "Wrong Password",
            ]);
        }
        
    }

}