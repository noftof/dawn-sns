@extends('layouts.login')

@section('content')
<div class="container">
    <div class="form-group">
      @auth
      {!! Form::open(['url' => '/users/profile','files' => true]) !!}
      {!! Form::token() !!}
        {!! Form::label('UserName', 'ユーザー名') !!}
        {!! Form::text('username', null, ['class' => 'form-control','id'=> 'UserName', 'placeholder' => 'ユーザー名']) !!}

        {!! Form::label('inputEmail', 'メールアドレス') !!}
          {!! Form::email('inputEmail', null, ['class' => 'form-control','id' => 'inputEmail', 'placeholder' => 'メールアドレス']) !!}

        {!! Form::label('newPassword', '新しいパスワード') !!}
        {!! Form::password('newPassword', null, ['class' => 'form-control','id' => 'newPassword', 'placeholder' => '新しいパスワード']) !!}
          {!! Form::label('checkPassword', '確認') !!}
        {!! Form::password('checkPassword', null, ['class' => 'form-control','id' => 'checkPassword', 'placeholder' => '確認']) !!}

        {!! Form::label('Bio', 'Bio') !!}
        {!! Form::textarea('Bio', null, ['class' => 'form-control','id' => 'Bio', 'placeholder' => 'Bio']) !!}

        {!! Form::label('IconImage', 'IconImage') !!}
        {!! Form::file('IconImage', ['class' => 'form-control','id' => 'IconImage' , 'placeholder' => '画像をアップロード']) !!}
    </div>
    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endauth
    </div>
</div>
@endsection
