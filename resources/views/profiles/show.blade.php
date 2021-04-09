@extends('layouts.app')

@section('content')
    <header class=" mb-6 relative">
        <img
            class="rounded-lg"
            src="/images/banner2.jpeg"
            alt=""
        >

        <div class="flex justify-between mt-4 mb-4 items-center">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{$user->name}}</h2>
                <p class="text-sm">{{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                @if(current_user()->is($user))
                <a
                    href="{{$user->path()}}/edit"
                    class="rounded-full shadow py-2 px-4 text-black text-sm"
                >
                    Edit Profile
                </a>
                @endif
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum vulputate enim,
            vel consequat tortor mollis ac. Quisque sapien ligula, tempor nec venenatis vitae, molestie quis urna.
            Maecenas mattis est sit amet ornare rutrum. Sed interdum at justo ac finibus. Suspendisse potenti.
            Pellentesque orci quam, finibus eu magna at, tempor pellentesque risus. Aenean maximus blandit tellus,
            finibus blandit est. Pellentesque mollis consectetur condimentum.
        </p>

        <img
            src="{{$user->avatar}}"
            alt=""
            class="rounded-full mr-2 absolute"
            style=" width: 150px; left: calc(50% - 75px); top: 53%"
        >

    </header>

    <hr>

    @include('_timeline', [
    'tweets' => $user->tweets
     ])
@endsection
