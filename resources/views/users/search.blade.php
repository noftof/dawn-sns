@extends('layouts.login')

@section('content')

<div class="container">
  {!! Form::open(['route' => 'users.search', 'method' => 'GET']) !!}
    <div class="form-group">
        {!! Form::label('search', 'ユーザー名で検索:') !!}
        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名を入力してください']) !!}
    </div>
    {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

<h3>検索結果</h3>
@if(isset($users) && $users->count() > 0)
  @foreach($users as $user)
    <p>{{ $user->username }}</p>
    @endforeach
  @else
    <p>検索結果がありません</p>
  @endif
</div>
@endsection
