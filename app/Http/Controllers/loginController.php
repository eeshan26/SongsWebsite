<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\user_model;
use DB;

class loginController extends Controller
{
    public function displayform()
    {
        return view('loginform');
    }

    public function displayregistrationform()
    {
        return view('registrationform');
    }

    public function checkregister(Request $req)
    {
        $name= $req->input('name');
        $email= $req->input('email');
        $password= $req->input('password');    
        $street_address= $req->input('street_address'); 
        $dob= $req->input('dob');
        DB::insert('insert into user values(null,?,?,?,?,?)',[$name,$email,$password,$street_address,$dob]);
        return view('welcome');
    }

    public function check(Request $req)
    {
        $req->validate([
            'UId'=>'required | numeric',
        ]);
        $user= User_model::where("UId",$req->input('UId'))->get();
        // // $pword_check=Hash::check($req->input('password'),'$user->password');
        // $hashed=Hash::make("123456");
        if($req->input('password')==$user[0]->password)
            {
                // Session::put('check_user',$user);
                // $check_user=Session::get('check_user');
                Session::put('check_user',$user);
                return view('dashboard')->with('success','Valid login');
            }
        else
            return 0;
    }

    public function logout()
    {
        return redirect('/');
    }
}
