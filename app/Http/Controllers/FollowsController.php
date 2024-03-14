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
    public function follow(Request $request)
    {
        follow::firstOrCreate([
            'follow' => $request->post_user,
            'follower' => $request->auth_user
        ]);
        return true;
    }
    // フォロー解除
    public function unfollow(Request $request)
    {
        $follow = follow::where('follow',$request->post_user)
            ->where('follower',$request->auth_user)
            ->first();
        if($follow){
            $follow->delete();
            return false;
        }
    }
}
