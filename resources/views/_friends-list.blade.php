
<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Friends</h3>

    <ul>
        @foreach (auth()->user()->follows as $follow)
            <li class="mb-4">
                <div class="flex items-center text-sm">
                    <img
                        src="{{$follow->avatar}}"
                        alt=""
                        class="rounded-full mr-2"
                    >

                    {{$follow->name}}
                </div>
            </li>
        @endforeach
    </ul>
</div>