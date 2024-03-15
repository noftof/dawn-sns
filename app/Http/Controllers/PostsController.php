<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //timeline表示
    public function index(){
        $posts = DB::table('posts')
                    ->join('users','posts.user_id','users.id','username')
                    ->select('users.username','users.images','posts.*')
                    ->orderBy('posts.created_at','desc')
                    ->get();
                    // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }
    public function create(Request $request)
    {
        $posts = $request->input('newPosts');
        $user_id= Auth::id();
        DB::table('posts')->insert([
            'user_id'=>$user_id,
            'posts' => $posts
        ]);
        return redirect('/top');
    }
    // ログインユーザー確認
    public function __construct()
    {
    $this->middleware('auth');
    // dd($this);
    }
    // 編集機能
    public function editform($id)
    {
        if(Auth::check()){
        $posts = DB::table('posts')
            ->where('id',$id)
            ->first();
            return view('posts.edit',['posts'=>$posts]);
        }else{
            return redirect('/login')->with('error','ログインしてください');
        }
    }
    public function edit(Request $request)
    {
        if(Auth::check()){
        $id= $request->input('id');
        $up_post = $request->input('upPost');
        // dd($id);
        DB::table('posts')
            ->where('id',$id)
            ->update(['posts' => $up_post]);
            return redirect('/top');
        }else{
            return redirect('/login')->with('error','ログインしてください');
        }
    }
    // delete機能
    public function delete($id)
    {
        if(Auth::check()){
        //  dd($this);
        DB::table('posts')
        ->where('id',$id)
        ->delete();
    return redirect('/top');
     }else{
            return redirect('/login')->with('error','ログインしてください');
     }
    }

}
