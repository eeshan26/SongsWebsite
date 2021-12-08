<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\songs_model;
use DB;

class songsController extends Controller
{
    public function viewdata()
    {
        return view('displaySongsData');
    }

    public function index()
    {
        // $check_company_id=Session::get('check_company_id');
        $user=DB::select('select * from songs');
        return view('displaySongsData',['user'=>$user]);
    }

    public function edit_function($SongId)
    {
        $user= DB::select('select * from songs where SongId = ?',[$SongId]);
        return view('song_edit',['user'=>$user]);
    }

    public function update_function(Request $req, $SongId)
    {   
        $artist= $req->input('artist');   
        $song_title= $req->input('song_title');
        $album= $req->input('album');
        $year= $req->input('year');    
        DB::update('update songs set artist = ?, song_title = ?, album = ?, year = ? where SongId = ?'
        ,[$artist,$song_title,$album,$year, $SongId]);
        return redirect('displaySongsData')->with('success','Song Data Updated');
    }

    public function delete_function($SongId)
    {
        DB::delete('delete from fav_songs where SongId = ?',[$SongId]);
        DB::delete('delete from songs where SongId = ?',[$SongId]);
        return redirect('displaySongsData');
    }

    public function markAsFavourite_function($SongId)
    {
        $check_user=Session::get('check_user');
        $check_user_id=$check_user[0]->UId;
        if(DB::select('select * from fav_songs where SongId = ? and UId = ?',[$SongId,$check_user_id]))
        {
            return redirect('displaySongsData')->with('success','Song already in favourites');
        }
        DB::insert('insert into fav_songs values(?,?)',[$check_user_id, $SongId]);
        return redirect('displaySongsData');
    }
}
