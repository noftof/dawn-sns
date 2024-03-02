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
                    ->join('users','posts.user_id','users.id')
                    ->orderBy('posts.created_at','desc')
                    ->get();
                    dd($posts);
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
    // 編集機能
    public function editform($id)
    {
        $post = DB::table('posts')
            ->where('id',$id)
            ->first();
            return view('posts.edit',['posts'=>$posts]);
    }
    public function edit(Request $request)
    {
        $id= $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id',$id)
            ->update(['posts' => $up_post]);
            return redirect('/top');
    }
    // delete機能
    public function delete($id)
    {
    DB::table('posts')
        ->where('id',$id)
        ->delete();
    return redirect('/top');
    }

}
