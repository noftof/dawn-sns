<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    //  検索
    public function search(Request $request){
        $search = $request->input('search');
        $users = DB::table('users')
        ->where('username','LIKE',"%$search%")
        ->get();
        // dd($users);
        return view('users.search',['users' => $users,'searchWord' => $search]);
    }

}
