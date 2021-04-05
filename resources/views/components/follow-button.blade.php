@unless(current_user()->is($user))
<form method="post" action="/profiles/{{$user->name}}/follow">
    @csrf

    <button
        href="#"
        class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-sm"
    >
        {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
    </button>
</form>
@endunless
