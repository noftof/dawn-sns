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
  <td><a class="btn" href=""><img src="" alt="アイコン"></a></td>
  <!-- <td>{{ $post ->user_id}}</td> -->
  <td class="username">〇〇</td>
  <td class="timeline-post">{{ $post ->posts}}</td>
  <td class="timestamp">{{ $post ->created_at}}</td>

<!-- 編集ボタン -->
  <td>
    <button type="submit" class="btn edit-btn" data-toggle="modal" data-target="#editModal" data-postid="{{ $post->id }}"><img src="images/edit.png" alt="編集"></button>
  </td>
<!-- 削除ボタン -->
  <td><a class="btn-danger" href="/post/{{ $post->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
  <img src="images/trash.png" alt="削除">
</a></td>
</tr>
@endforeach
</table>
<!-- モーダル -->
<div class="modal-main js-modal" id="modal">
  <div class="modal-inner">
    <div class="inner-content">
    <!-- 編集フォーム -->
    {!! Form::open(['url'=> '/post/edit','id'=>'editForm']) !!}
    <div class="form-group">
    {!! Form::hidden('id', $post->id) !!}
    {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'uppost', 'autocomplete' => 'off']) !!}
    </div>
  <button type="submit" class="postbtn"><img src="images/edit.png" alt="Postする"></button>
    {!! Form::close() !!}
    <!-- 編集フォーム終わり -->
  </div>
</div>
<!-- モーダル終わり -->

@endsection
