
<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Friends</h3>

    <ul>
        @foreach (auth()->user()->follows as $follow)
            <li class="mb-4">
                <div>
                    <a href="{{route('profile', $follow)}}" class="flex items-center text-sm">
                    <img
                        src="{{$follow->avatar}}"
                        alt=""
                        class="rounded-full mr-2"
                        width="40"
                        height="40"
                    >

                    {{$follow->name}}
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
