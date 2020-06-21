@extends('layouts.app')

@section('content')
  <header class="mb-6">
      <img class="w-full h-56 object-cover object-center rounded mb-2"
          src="/image/kimi.jpg"
          alt=""
      >

      <div class="flex justify-between items-center">
          <div>
              <h2 class="font-bold">{{$user->username}}</h2>
          </div>
          <img
              src="{{$user->avatar}}"
              alt=""
              class="rounded-full  h-32 w-32 mr-2" style=" margin-top:-75px"
          >

          <div class="flex">
                @if (auth()->user()->is($user))
              <a href="{{$user->path('edit')}}" class=" rounded-full border border-gray-300 py-2 px-2 text-black text-xs">Edit me</a>
                @endif

                  @if (auth()->user()->isNot($user))
              <form method="POST" action="{{route('follow', $user->username)}}">
                  @csrf
                  <button type="submit"
                          class="bg-blue-500 rounded-full shadow py-2 px-2 text-white text-xs">
                      {{auth()->user()->following($user) ? 'Unfollow Me': 'Follow Me'}}

                  </button>
              </form>
                  @endif
          </div>

      </div>
      <p class="text-sm">
          “There’s no way we could meet. But one thing is certain. If we see each other, we’ll know. That you were the one who was inside me. That I was the one who was inside you.” – Mitsuha Miyamizu
      </p>
  </header>

    @include('_timeline',[
        'tweets'=> $user->tweets
    ])
@endsection
