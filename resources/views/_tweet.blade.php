<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile', $tweet->user)}}">
            <img
            src="{{ $tweet->user->avatar }}"
            alt=""
            class="rounded-full mr-2"
            width="50"
            height="50"
        >
        </a>
    </div>

    <div>
        <a href="{{route('profile', $tweet->user) }}">
            <h5 class="font-bold mb-2">{{ $tweet->user->name }}</h5>
        </a>

        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>
