<div class="w-full grid grid-cols-9 gap-4 py-2 h-12">
    <a href="{{ route('offers.show', $offer->id) }}">
        <div class="text-center">
            <p> {{$offer->id}} </p>
        </div>
    </a>
    <div class="text-center">
        <p>{{$offer->title}}</p>
    </div>
    <div class="overflow-hidden">
        <p>{{$offer->description}}</p>
    </div>
    <div class="text-center">
        <p>{{$offer->amount}}</p>
    </div>
    <div class="text-center">
        <p>{{$offer->price / 100}}</p>
    </div>
    <div class="text-center">
        <p>{{$offer->created_at}}</p>
    </div>
    <div class="text-center">
        <p>{{$offer->deleted_at}}</p>
    </div>
    <a href="{{ route('offers.edit', $offer->id) }}">
        <div class="flex justify-center">
            <img class="h-10 w-10" src="{{ Vite::asset('resources/images/edit.svg') }}" alt="Edit">
        </div>
    </a>
    <form class="hover:cursor-pointer" action="{{ route('offers.destroy', $offer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit">
                <img class="h-10 w-10" src="{{ Vite::asset('resources/images/trash.svg') }}" alt="Delete">
            </button>
        </div>
    </form>
</div>