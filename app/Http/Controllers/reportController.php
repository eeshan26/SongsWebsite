<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class reportController extends Controller
{
    public function displayform()
    {
        return view('reportform');
    }

    public function check(Request $req)
    {

        $email= $req->input('email');
        $user_report=DB::select('select * from user where email = ?',[$email]);
        Session::put('check_report_user',$user_report);
        $check_report_user=Session::get('check_report_user');
        $user_id=$check_report_user[0]->UId;    
        $friends=DB::select('select * from friends inner join user where UId1= ? and UId=UId2',[$user_id]);
        $groups=DB::select('select * from group_members inner join groups_table where UId = ? and groups_table.GId=group_members.GId',[$user_id]);
        $sent_message=DB::select('select * from chat_message inner join user where sender_flag=1 and senderUId = ? and to_UId=UId order by to_UId',[$user_id]);
        $recieved_message=DB::select('select * from chat_message inner join user where reciever_flag=1 and to_UId= ? and senderUId=UId order by senderUId',[$user_id]);
        $group_sent=DB::select('select * from group_message inner join groups_table where GId=to_GId and senderUId = ? order by to_GId',[$user_id]);
        $group_recieve=DB::select('select * from group_message INNER JOIN group_members inner join user WHERE GId=to_GId and senderUId=user.UId and group_members.UId=? and senderUId !=? ORDER by to_GId,date_time;',[$user_id,$user_id]);
        return view('displayUserReport',['user_report'=>$user_report,'friends'=>$friends,'groups'=>$groups,'sent_message'=>$sent_message,'recieved_message'=>$recieved_message,'group_sent'=>$group_sent,'group_recieve'=>$group_recieve]);

    }

}
