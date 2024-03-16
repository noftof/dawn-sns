<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //プロフィール
    public function profile(){
        $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }
    // プロフィールの更新
    public function profileUpdate(Request $request, User $user){
        dd($user);
        try{
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
        } catch (\Exception $e){
            return back()->with('msg_error','プロフィールの更新に失敗しました')->withInput();
        }
        return redirect()->route('users.profile_edit')->with('msg_success','プロフィールの更新が完了しました');
    }
    // パスワード編集
    public function passwordUpdate(){
        try{
            $user = Auth::user();
            $user->password = bcrypt($request->input('newPassword'));
            $user->save();
        } catch (\Exception $e){
            return back()->with('msg_error','パスワードの更新に失敗しました')->withInput();
        }
        return redirect()->route('password_edit')->with('msg_success','パスワードの更新が完了しました');
    }
    // 相手のプロフィール
    public function otherProfile(){
        return view('users.otherProfile',['user' => $user]);
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
