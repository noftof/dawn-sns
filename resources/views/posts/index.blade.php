@extends('layouts.login')

@section('content')
    <table class='table table-hover'>
    {!! Form::open(['url' => '/post/create']) !!}
    <div class="form-group">
    <p><a class="btn user-icon" href="/profile"><img src="" alt="アイコン"></a></p>
    {!! Form::input('text', 'newPosts', null, ['required', 'class' => 'newposts', 'placeholder' => '何をつぶやこうか...?', 'autocomplete' => 'off']) !!}
  </div>
  <button type="submit" class="postbtn"><img src="images/post.png" alt="Postする"></button>
    {!! Form::close() !!}
@foreach ($posts as $post)
<tr>
  <td><a class="btn btn-primary" href=""><img src="" alt="アイコン"></a></td>
  <!-- <td>{{ $post ->user_id}}</td> -->
  <td class="username">〇〇</td>
  <td class="timeline-post">{{ $post ->posts}}</td>
  <td class="timestamp">{{ $post ->created_at}}</td>
  <td><a class="btn btn-primary" href="/post/{{ $post->id}}/edit"><img src="images/edit.png" alt="編集"></a></td>
  <td><a class="btn-danger" href="/post/{{ $post->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
  <img src="images/trash.png" alt="削除">
</a></td>
</tr>
@endforeach
</table>

@endsection
