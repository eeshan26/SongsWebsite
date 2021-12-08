<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\groups_model;
use DB;

class groupsController extends Controller
{
    public function viewdata()
    {
        return view('displayGroupsData');
    }

    public function index()
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user= DB::select('select * from groups_table inner join group_members where group_members.GId=groups_table.GId and UId= ?',[$check_user_id]);
        return view('displayGroupsData',['user'=>$user]);
    }
    public function delete($UId, $GId)
    { 
        DB::delete('delete from group_members where UId= ? and GId = ?', [$UId,$GId]);
        return redirect('displayGroupsData')->with('success','Group removed succesfully');
    }

    public function Group_message($UId,$GId)
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user=DB::select('select * from group_message INNER JOIN group_members INNER JOIN user where user.UId= ? and user.UId=group_members.UId and to_GId=GId and to_GId= ? ORDER BY date_time ASC;',[$check_user_id,$GId]);
        $message_reciever_group_id=$GId;
        Session::put('message_reciever_group_id',$message_reciever_group_id);
        return view('group_message',['user'=>$user]);
    }

    public function write_message()
    {
        return view('write_group_message');
    }

    public function send_message(Request $req)
    {
        $body=$req->input('message');
        $sender=Session::get('check_user');
        $senderUId=$sender[0]->UId;
        $to_GId=Session::get('message_reciever_group_id');
        // $user=DB::select('select * from chat_message INNER JOIN user where sender_flag=1 and senderUId=UId and ((senderUId= ? and to_UId= ?) or (senderUId= ? and to_UId= ?)) ORDER BY date_time ASC',[$senderUId,$to_UId,$to_UId,$senderUId]);
        DB::insert('insert into group_message values(sysdate(),?,?,?)',[$senderUId,$to_GId,$body]);
        return redirect('displayGroupsData');
    }

    public function viewAllGroupsdata()
    {
        return view('displayAllGroupsData');
    }

    public function allGroupIndex()
    {
        // $check_company_id=Session::get('check_company_id');
        $user=DB::select('select * from groups_table');
        return view('displayAllGroupsData',['user'=>$user]);
    }

    public function allGroupsdelete($GId)
    {
        $no_of_members=DB::select('select count(*) from group_members where GId = ?',[$GId]);
        
        if(DB::select('select * from group_members where GId = ?',[$GId]))
        {
            $user=DB::select('select * from groups_table');
            return redirect('displayGroupsData')->with('success','Group has members so cannot be deleted');
        }
        DB::delete('delete from group_message where to_GId = ?',[$GId]);
        DB::delete('delete from groups_table where GId = ?', [$GId]);
        $user1=DB::select('select * from groups_table');
        return redirect('displayGroupsData'); 
        
    }

    public function Groupjoin($GId)
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user=DB::select('select * from groups_table');
        if(DB::select('select * from group_members where UId = ? and GId = ?',[$check_user_id,$GId]))
        {
            return redirect('displayGroupsData')->with('success','You are already a member of the group');
        }
        DB::insert('insert into group_members values(?,?)',[$check_user_id, $GId]);
        return redirect('displayGroupsData');
    }

    public function Groupedit($GId)
    {
        $user= DB::select('select * from groups_table where GId = ?',[$GId]);
        return view('group_edit',['user'=>$user]);
    }

    public function update_function(Request $req, $GId)
    {
        $group_name= $req->input('group_name');   
        $fav_artist= $req->input('fav_artist');
        $description= $req->input('description');    
        DB::update('update groups_table set group_name = ?, fav_artist = ?, description = ? where GId = ?'
        ,[$group_name,$fav_artist,$description, $GId]);
        $user=DB::select('select * from groups_table');
        return view('displayAllGroupsData',['user'=>$user]);
    }
}
