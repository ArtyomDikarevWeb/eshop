<form @if(request()->routeIs('offers.edit')) action="{{ route('offers.update', $offer->id) }}" method="POST"@endif>
    @if(request()->routeIs('offers.edit'))
        @method('PUT')
        @csrf
    @endif
    <div class="text-center p-3">
        @if (request()->routeIs('offers.edit'))
            <h3 class="text-3xl"> Редактировать </h3>    
        @else
            <h3 class="text-3xl"> {{$offer->title}} </h3> 
        @endif
    </div>
    <div class="m-2">
        <label class="mr-3" for="id">ID:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="id" 
            id="id" 
            disabled
            value={{$offer->id}} 
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="name">Name:</label>
        <input type="text" 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            name="name" 
            id="name" 
            @disabled(request()->routeIs('offers.show')) 
            value={{$offer->title}}
        />
    </div>
    <div class="m-2 flex items-center">
        <label class="mr-3" for="description">Description:</label>
        <textarea 
            class="px-2 w-80 h-40 border-2 border-slate-700 border-solid rounded" 
            name="description" 
            id="description" 
            @disabled(request()->routeIs('offers.show'))
            >
            {{$offer->description}}
        </textarea>
    </div>
    <div class="m-2">
        <label class="mr-3" for="amount">Amount:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="amount" 
            id="amount" 
            @disabled(request()->routeIs('offers.show')) 
            value={{$offer->amount}}
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="price">Stock price:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="price" 
            id="price" 
            @disabled(request()->routeIs('offers.show')) 
            value={{$offer->price}}
        />
    </div>
    <div class="m-2 flex gap-3 justify-between">
        @if (request()->routeIs('offers.edit'))
            <button 
                class="p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition" 
                type="submit"
            >Обновить</button>
            <button
                class="p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition"
            ><a href="{{ route('offers.index') }}">Назад</a></button>
        @else
        <button
            class="p-2 w-max rounded-full 
            bg-slate-500 text-cyan-50 
            hover:bg-slate-300 hover:text-zinc-600 
            hover:transition"
        ><a href="{{ route('offers.index') }}">Назад</a></button>
        @endif
    </div>
</form>