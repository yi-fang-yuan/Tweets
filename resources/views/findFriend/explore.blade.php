@extends('layouts.app')

@section('content')
    @foreach($users as $user)
        <a href="{{$user->path()}}">
<div class="flex items-center mb-5">
    <img src="{{$user->avatar}}"
         alt=""
         class="rounded mr-4"
         width="60"
         height="60"
    >
    <h4 class="font-bold">{{$user->username}} </h4>

</div>
    @endforeach

@endsection
