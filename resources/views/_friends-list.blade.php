<h3 class="font-bold text-xl mb-4">Friends</h3>

<ul>
    @forelse(auth()->user()->follows as $user)
    <li class="mb-2">
        <div >
            <a href="{{route('profile',$user)}}" class="flex items-center text-sm">
            <img
                src="{{$user->avatar}}"
                alt=""
                class="rounded-full mr-2"
                width="40"
                height="40"
            >
            {{$user->username}}
            </a>
        </div>
        @empty
            <p class="p-4">No friends Yet</p>

    </li>
        @endforelse
</ul>

