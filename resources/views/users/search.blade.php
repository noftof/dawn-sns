@extends('layouts.login')

@section('content')

<div class="container">
  {!! Form::open(['route' => 'users.search', 'method' => 'GET']) !!}
    <div class="form-group">
        <!-- {!! Form::label('search', 'ユーザー名で検索:') !!} -->
        {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
    </div>
    {!! Form::image('images/search.png','検索', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
<div class="searchword">
  <p class="word">検索ワード：{{ $searchWord }}</p>
</div>
<div class="search-list">
@if(isset($users) && $users->count() > 0)
  @foreach($users as $user)
    <div class="userlist">
      <a class="btn" href="/profile">
      <img src="images/{{ $user-> images }}" alt="アイコン"></a>
      {{ $user->username }}
      <button>フォローする</button>
      <button>フォローをはずす</button>
    </div>
    @endforeach
  @else
    <p>検索結果がありません</p>
  @endif
</div>
</div>
@endsection
