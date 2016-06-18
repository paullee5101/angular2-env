<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function signUp() 
    {
        $sql  = 'INSERT INTO users SET ';
        $sql .= 'user_id ="'.uniqid(rand(), true).'", ';
        $sql .= 'active ="y", ';
        $sql .= 'first_name ="'.Input::get("first_name").'", ';
        $sql .= 'last_name ="'.Input::get("last_name").'", ';
        $sql .= 'phone ="'.Input::get("phone").'", ';
        $sql .= 'email ="'.Input::get("email").'", ';
        $sql .= 'secret ="'.hash("Whirlpool", Input::get("secret")).'", ';
        $sql .= 'created = NOW() ';
        DB::insert($sql);
    }
    
    public function signIn() 
    {
        $sql  = 'SELECT user_id, CONCAT(first_name," ", last_name), email FROM users ';
        $sql .= 'WHERE email ="'.Input::get('email').'", ';
        $sql .= 'AND secret ="'.hash("Whirlpool", Input::get("secret")).'" ';
        $sql .= 'AND active ="y" ';
        $sql .= 'AND validity > NOW() ';
        Session::put('auth_data', DB::select($sql));
    }
    
    public function getUserProfile() 
    {
        $sql  = 'SELECT * FROM users ';
        $sql .= 'WHERE user_id ="'.Session::get('auth_data')['user_id'].'" ';
        DB::select($sql);
    }
    
    public function updateUserProfile()
    {
        $sql  = 'UDPATE users SET ';
        $sql .= 'active ="y", ';
        $sql .= 'first_name ="'.Input::get("first_name").'", ';
        $sql .= 'last_name ="'.Input::get("last_name").'", ';
        $sql .= 'phone ="'.Input::get("phone").'", ';
        $sql .= 'email ="'.Input::get("email").'", ';
        $sql .= 'secret ="'.hash("Whirlpool", Input::get("secret")).'", ';
        $sql .= 'WHERE user_id ="'.Session::get('auth_data')['user_id'].'", ';
        DB::update($sql);
    }
}