<div class="w-full grid grid-cols-6 gap-4 py-2 h-12">
    <a href="{{ route('categories.show', $category->id) }}">
        <div class="text-center">
            <p> {{$category->id}} </p>
        </div>
    </a>
    <div class="text-center">
        <p>{{$category->title}}</p>
    </div>
    <div class="text-center">
        <p>{{$category->created_at}}</p>
    </div>
    <div class="text-center">
        <p>{{$category->deleted_at}}</p>
    </div>
    <a href="{{ route('categories.edit', $category->id) }}">
        <div class="flex justify-center">
            <img class="h-10 w-10" src="{{ Vite::asset('resources/images/edit.svg') }}" alt="Edit">
        </div>
    </a>
    <form class="hover:cursor-pointer" action="{{ route('categories.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit">
                <img class="h-10 w-10" src="{{ Vite::asset('resources/images/trash.svg') }}" alt="Delete">
            </button>
        </div>
    </form>
</div>