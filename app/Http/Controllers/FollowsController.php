<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        $users = DB::table('users')
            // ->join('follows','')
            ->get();
            // dd($users);
        return view('follows.followList',['users' => $users]);
    }
    public function followerList(){
        $users = DB::table('users')
            ->get();
            // dd($users);
        return view('follows.followList',['users' => $users]);
    }
    // フォローする
    public function store($user_id){
        Auth::user()->follows()->attach($user_id);
        return;
    }
    // フォロー外す
    public function destroy($user_id){
        Auth::user()->follows()-detach($user_id);
        return;
    }
    }
