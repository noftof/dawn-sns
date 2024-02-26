<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
                    ->orderBy('created_at','desc')
                    ->get();
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
    public function delete($id)
    {
    DB::table('posts')
        ->where('id',$id)
        ->delete();
    return redirect('/top');
    }

}
