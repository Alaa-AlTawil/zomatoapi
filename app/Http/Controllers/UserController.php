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
         $users=User::where($res->id=$request->id);
         $res->F_name=$request->fname;
         $res->L_name=$request->lname;
         $res->Password=hash('sha256', $request->pass);
         
         $res->save();
         return response()->json([
             "status" => "success"],200);
     }
     

}