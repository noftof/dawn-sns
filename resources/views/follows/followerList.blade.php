@extends('layouts.login')

@section('content')
@foreach ($users as $user)
<div class="container">
    <div class="userlist">
      <a class="btn" href="/profile">
      <img src="images/{{ $user-> images }}" alt="アイコン"></a>
      {{ $user -> username }}
      <button onclick="follow/{{ $user->id }}">フォローする</button>
      <button>フォローをはずす</button>
    </div>
</div>
@endforeach
@endsection
