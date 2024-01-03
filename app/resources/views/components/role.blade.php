<div class="w-full grid grid-cols-6 gap-4 py-2 h-12">
    <a href="{{ route('roles.show', $role->id) }}">
        <div class="text-center">
            <p> {{$role->id}} </p>
        </div>
    </a>
    <div class="text-center">
        <p>{{$role->title}}</p>
    </div>
    <div class="text-center">
        <p>{{$role->created_at}}</p>
    </div>
    <div class="text-center">
        <p>{{$role->deleted_at}}</p>
    </div>
    <a href="{{ route('roles.edit', $role->id) }}">
        <div class="flex justify-center">
            <img class="h-10 w-10" src="{{ Vite::asset('resources/images/edit.svg') }}" alt="Edit">
        </div>
    </a>
    <form class="hover:cursor-pointer" action="{{ route('roles.destroy', $role->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit">
                <img class="h-10 w-10" src="{{ Vite::asset('resources/images/trash.svg') }}" alt="Delete">
            </button>
        </div>
    </form>
</div>