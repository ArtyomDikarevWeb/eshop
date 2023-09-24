<div class="w-full grid grid-cols-10 gap-4 py-2 h-12">
    <a href="{{ route('users.show', $user->id) }}">
        <div class="text-center">
            <p> {{$user->id}} </p>
        </div>
    </a>
    <div class="text-center">
        <p>{{$user->email}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->phone}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->site_name}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->getFullName()}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->role?->title}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->created_at}}</p>
    </div>
    <div class="text-center">
        <p>{{$user->deleted_at}}</p>
    </div>
    <a href="{{ route('users.edit', $user->id) }}">
        <div class="flex justify-center">
            <img class="h-10 w-10" src="{{ Vite::asset('resources/images/edit.svg') }}" alt="Edit">
        </div>
    </a>
    <form class="hover:cursor-pointer" action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit">
                <img class="h-10 w-10" src="{{ Vite::asset('resources/images/trash.svg') }}" alt="Delete">
            </button>
        </div>
    </form>
</div>