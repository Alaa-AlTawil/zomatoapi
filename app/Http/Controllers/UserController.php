<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Restaurant;


class UserController extends Controller{

    public function getAllUsers(){
        $users=User::all();
        return response()->json([
            "status" => "success",
            "users" => $users
        ],200);


    } 
    public function getAllRestaurants(){
        $restaurants=Restaurant::all();
        return response()->json([
            "status" => "success",
            "restaurants" => $restaurants
        ],200);


    } 

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
    public function addUser(Request $request){
        $first_name = $request->fname;
        $last_name = $request->lname;
        $type = $request->type;
        $email = $request->email;
        $password = $request->pass;
        $res = new User;
        $res->F_name=$first_name;
        $res->L_name=$last_name;
        $res->Type=$type;
        $res->Email=$email;
        $res->Password=$password;
        $res->save();
        return response()->json([
            "status" => "success"],200);
    }
}