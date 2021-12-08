<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\friends_model;
use DB;
class friendsController extends Controller
{
    public function viewdata()
    {
        return view('displayFriendsData');
    }
    public function index()
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user= DB::select('select * from friends inner join user where friends.UId2=user.UId and UId1= ?',[$check_user_id]);
        return view('displayFriendsData',['user'=>$user]);
    }

    public function delete($UId1, $UId2)
    { 
        DB::delete('delete from friends WHERE UId1 = ? and UId2 = ?', [$UId1,$UId2]);
        DB::delete('delete from friends WHERE UId1 = ? and UId2 = ?', [$UId2,$UId1]);
        return redirect('displayFriendsData')->with('success','Friend removed');
    }

    public function message($UId1,$UId2)
    {
        $user=DB::select('select * from chat_message INNER JOIN user where sender_flag=1 and senderUId=UId and ((senderUId= ? and to_UId= ?) or (senderUId= ? and to_UId= ?)) ORDER BY date_time ASC',[$UId1,$UId2,$UId2,$UId1]);
        $message_reciever_id=$UId2;
        Session::put('message_reciever_id',$message_reciever_id);
        return view('chat_message',['user'=>$user]);
    }

    public function write_message()
    {
        
        return view('write_message');
    }

    public function delete_message($date_time)
    {
        $user1=Session::get('check_user');
        $UId1=$user1[0]->UId;
        $UId2=Session::get('message_reciever_id');
        DB::update('update chat_message set sender_flag = 0 where date_time = ?',[$date_time]);
        // $user= DB::select('select * from friends inner join user where friends.UId2=user.UId and UId1= ?',[$UId1]);
        $user=DB::select('select * from chat_message INNER JOIN user where  senderUId=UId and sender_flag= 1 and ((senderUId= ? and to_UId= ?) or (senderUId= ? and to_UId= ?)) ORDER BY date_time ASC',[$UId1,$UId2,$UId2,$UId1]);
        return view('chat_message',['user'=>$user]);
    }

    public function send_message(Request $req)
    {
        
        $body=$req->input('message');
        $sender=Session::get('check_user');
        $senderUId=$sender[0]->UId;
        $to_UId=Session::get('message_reciever_id');
        $user=DB::select('select * from chat_message INNER JOIN user where sender_flag=1 and senderUId=UId and ((senderUId= ? and to_UId= ?) or (senderUId= ? and to_UId= ?)) ORDER BY date_time ASC',[$senderUId,$to_UId,$to_UId,$senderUId]);
        DB::insert('insert into chat_message values(sysdate(),?,?,?,1,1)',[$senderUId,$to_UId,$body]);
        return redirect('displayFriendsData');
    }

    public function Usersviewdata()
    {
        return view('displayAllUsersData');
    }

    public function Usersindex()
    {
        // $check_company_id=Session::get('check_company_id');
        $user=DB::select('select * from user');
        return view('displayAllUsersData',['user'=>$user]);
    }

    public function deleteUsers_function($UId)
    {
        DB::delete('delete from chat_message where senderUId= ? or to_UId= ?',[$UId,$UId]);
        DB::delete('delete from fav_songs where UId= ?',[$UId]);
        DB::delete('delete from group_message where senderUId= ?',[$UId]);
        DB::delete('delete from group_members where UId= ?',[$UId]);
        DB::delete('delete from friends where UId1= ? or UId2= ?',[$UId,$UId]);
        DB::delete('delete from user where UId = ?',[$UId]);
        $user=DB::select('select * from user');
        return view('displayAllUsersData',['user'=>$user]);
    }

    public function addFriend_function($UId)
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        if(DB::select('select * from friends where UId1 = ? and UId2 = ? or UId1=UId2',[$check_user_id,$UId]))
        {
            return redirect('displayFriendsData')->with('success','Already a friend');
        }
        DB::insert('insert into friends values(?,?)',[$check_user_id, $UId]);
        DB::insert('insert into friends values(?,?)',[$UId,$check_user_id]);
        return redirect('displayFriendsData');
    }

    public function edit_function($UId)
    {
        $user= DB::select('select * from user where UId = ?',[$UId]);
        return view('user_edit',['user'=>$user]);
    }

    public function updateUser_function(Request $req,$UId)
    {  
        $name= $req->input('name');
        $email= $req->input('email');
        $password= $req->input('password');    
        $street_address= $req->input('street_address'); 
        $dob= $req->input('dob'); 
        DB::update('update user set name = ?,  email= ?, password = ?, street_address= ?, dob = ? where UId = ?'
        ,[$name,$email,$password,$street_address,$dob,$UId]);
        $user=DB::select('select * from user');
        return view('displayAllUsersData',['user'=>$user]);
    }
}


