@extends('layouts.login')

@section('content')
@foreach ($users as $user)
<div class="container">
    <ul class="followlist">
      <li><a class="btn" href="/profile">
      <img src="images/{{ $user-> images }}" alt="アイコン"></a>
      {{ $user -> username }}</li>
    </ul>
</div>
@endforeach
@endsection
