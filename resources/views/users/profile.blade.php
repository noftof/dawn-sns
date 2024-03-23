@extends('layouts.login')

@section('content')
<div class="container">
    <div class="form-group">

      @auth
      {!! Form::open(['url' => 'users/profile_update' ,'method' => 'PUT','files' => true]) !!}
      {!! Form::hidden('id',$user->id)!!}
      {!! Form::token() !!}
      <div class="form-group pt-1">
        {!! Form::label('UserName', 'ユーザー名') !!}
        {!! Form::text('username', $user->name, ['class' => 'form-control','id'=> 'UserName', 'placeholder' => 'ユーザー名']) !!}
      </div>
      <div class="form-group pt-2">
        {!! Form::label('inputEmail', 'メールアドレス') !!}
          {!! Form::email('inputEmail', $user->email, ['class' => 'form-control','id' => 'inputEmail', 'placeholder' => 'メールアドレス']) !!}
          </div>
      <div class="form-group pt-3">
        {!! Form::label('newPassword', '新しいパスワード') !!}
        {!! Form::password('newPassword', ['class' => 'form-control','id' => 'newPassword', 'placeholder' => '新しいパスワード']) !!}
        </div>
      <div class="form-group pt-3">
          {!! Form::label('checkPassword', '確認') !!}
        {!! Form::password('checkPassword', ['class' => 'form-control','id' => 'checkPassword', 'placeholder' => '確認']) !!}
        </div>
      <div class="form-group pt-3">
        {!! Form::label('Bio', 'Bio') !!}
        {!! Form::textarea('Bio', $user->bio, ['class' => 'form-control','id' => 'Bio', 'placeholder' => 'Bio']) !!}
      </div>
        <div class="form-group pt-4">
        {!! Form::label('IconImage', 'IconImage') !!}
        {!! Form::file('IconImage', ['class' => 'form-control','id' => 'IconImage' , 'placeholder' => '画像をアップロード']) !!}
        </div>
</div>
    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endauth

    </div>
</div>
@endsection
