<div class="w-full grid grid-cols-9 gap-4 py-2 h-12" href="{{ route('products.edit', $product->id) }}">
    <a href="{{ route('products.show', $product->id) }}">
        <div class="text-center">
            <p> {{$product->id}} </p>
        </div>
    </a>
    <div class="text-center">
        <p>{{$product->name}}</p>
    </div>
    <div class="overflow-hidden">
        <p>{{$product->description}}</p>
    </div>
    <div class="text-center">
        <p>{{$product->amount}}</p>
    </div>
    <div class="text-center">
        <p>{{$product->stock_price / 100}}</p>
    </div>
    <div class="text-center">
        <p>{{$product->created_at}}</p>
    </div>
    <div class="text-center">
        <p>{{$product->deleted_at}}</p>
    </div>
    <a href="{{ route('products.edit', $product->id) }}">
        <div class="flex justify-center">
            <img class="h-10 w-10" src="{{ Vite::asset('resources/images/edit.svg') }}" alt="Edit">
        </div>
    </a>
    <form class="hover:cursor-pointer" action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center">
            <button type="submit">
                <img class="h-10 w-10" src="{{ Vite::asset('resources/images/trash.svg') }}" alt="Delete">
            </button>
        </div>
    </form>
</div>
