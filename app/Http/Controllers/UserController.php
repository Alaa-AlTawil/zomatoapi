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
}