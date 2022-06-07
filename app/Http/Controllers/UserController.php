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

}
