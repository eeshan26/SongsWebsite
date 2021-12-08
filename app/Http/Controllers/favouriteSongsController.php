<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\favourite_songs_model;
use DB;


class favouriteSongsController extends Controller
{
    public function viewdata()
    {
        return view('displayFavouriteSongsData');
    }
    public function index()
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user= DB::select('select * from fav_songs inner join songs where fav_songs.SongId=songs.SongId and UId= ?',[$check_user_id]);
        return view('displayFavouriteSongsData',['user'=>$user]);
    }

    public function delete($UId, $SongId)
    { 
        DB::delete('delete from fav_songs where UId= ? and SongId = ?', [$UId,$SongId]);
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        $user= DB::select('select * from fav_songs inner join songs where fav_songs.SongId=songs.SongId and UId= ?',[$check_user_id]);
        return view('displayFavouriteSongsData',['user'=>$user])->with('success','Song removed succesfully');
    }
}
