@extends('layouts.login')

@section('content')
    <table class='table table-hover'>
    {!! Form::open(['url' => '/post/create']) !!}
    <div class="form-group">
    <p><a class="btn user-icon" href="/profile"><img src="images/{{ Auth::user() -> images }}" alt="アイコン"></a></p>
    {!! Form::input('text', 'newPosts', null, ['required', 'class' => 'newposts', 'placeholder' => '何をつぶやこうか...?', 'autocomplete' => 'off']) !!}
  </div>
  <button type="submit" class="postbtn"><img src="images/post.png" alt="Postする"></button>
    {!! Form::close() !!}
@foreach ($posts as $post)
<tr>
  <td><a class="btn" href="/profile"><img src="images/{{ $post -> images }}" alt="アイコン"></a></td>
  <!-- <td>{{ $post ->user_id}}</td> -->
  <td class="username">{{ $post ->username}}</td>
  <td class="timeline-post">{{ $post ->posts}}</td>
  <td class="timestamp">{{ $post ->created_at}}</td>

<!-- 編集ボタン -->
  <td>
    <button class="modalopen" data-target="editModal" data-postid="{{ $post->id }}">
      <img src="images/edit.png" alt="編集">
    </button>
  </td>

<!-- 削除ボタン -->
  <td><a class="btn-danger" href="/post/{{ $post->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
  <img src="images/trash.png" alt="削除">
</a></td>
</tr>
@endforeach
</table>
  <!-- モーダル -->
<div  id="editModal" class="modal">
  <div class="modal-content">
    <!-- 編集フォーム -->
    {!! Form::open(['url'=> '/post/edit','id'=>'editForm']) !!}
    @csrf
    <div class="form-group">
    {!! Form::hidden('id', null, ['id' => 'postId']) !!}
    {!! Form::text('upPost', null, ['required', 'class' => 'uppost', 'autocomplete' => 'off', 'id'=> 'upPost']) !!}
    </div>
  <button type="submit" class="postbtn modalClose"><img src="images/post.png" alt="更新"></button>
    {!! Form::close() !!}
    <!-- 編集フォーム終わり -->
  </div>
</div>
<!-- モーダル終わり -->
@endsection
