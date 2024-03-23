@extends('layouts.login')

@section('content')
<table class='table table-hover'>
    {!! Form::open(['url' => '/post/create']) !!}
    <div class="form-group post-form">
    <p class="user-icon"><a class="btn user-icon" href="/profile"><img src="images/{{ Auth::user() -> images }}" alt="アイコン"></a></p>
    {!! Form::input('text', 'newPosts', null, ['required', 'class' => 'newposts', 'placeholder' => '何をつぶやこうか...?', 'autocomplete' => 'off']) !!}
  <button type="submit" class="postbtn"><img src="images/post.png" alt="Postする"></button>
    {!! Form::close() !!}
</div>
@foreach ($posts as $post)
<tr>
  <td><a class="btn" href="/profile"><img src="images/{{ $post -> images }}" alt="アイコン"></a></td>
  <!-- <td>{{ $post ->user_id}}</td> -->
  <td class="username">{{ $post ->username}}</td>
  <td class="timeline-post">{{ $post ->posts}}</td>
  <td class="timestamp">{{ $post ->created_at}}</td>

<!-- 編集ボタン -->
@if($post -> user_id == Auth::id())
  <td>
    <button class="modalopen" data-target="editModal{{ $post-> id}}" data-postid="{{ $post->id }}">
      <img src="images/edit.png" alt="編集">
    </button>
  </td>

<!-- 削除ボタン -->
  <td><a class="btn-danger" href="/post/{{ $post->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
  <img src="images/trash.png" alt="削除">
</a></td>
@endif
</tr>
 <!-- モーダル -->
<div  id="editModal{{ $post-> id}}" class="modal">
  <div class="modal-content">
    <!-- 編集フォーム -->
    {!! Form::open(['url'=> '/post/edit','id'=>'editForm']) !!}
    @csrf
    <div class="form-group">
    {!! Form::hidden('id', $post->id, ['id' => 'postId']) !!}
    {!! Form::text('upPost', $post->posts, ['required', 'class' => 'uppost', 'autocomplete' => 'off', 'id'=> 'upPost']) !!}
    </div>
  <button type="submit" class="postbtn modalClose"><img src="images/post.png" alt="更新"></button>
    {!! Form::close() !!}
    <!-- 編集フォーム終わり -->
  </div>
</div>
<!-- モーダル終わり -->
@endforeach
</table>

@endsection
