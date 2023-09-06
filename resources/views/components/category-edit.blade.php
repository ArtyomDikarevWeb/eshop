<form @if(request()->routeIs('categories.edit')) action="{{ route('categories.update', $category->id) }}" method="POST"@endif>
    @if(request()->routeIs('categories.edit'))
        @method('PUT')
        @csrf
    @endif
    <div class="text-center p-3">
        @if (request()->routeIs('categories.edit'))
            <h3 class="text-3xl"> Редактировать </h3>    
        @else
            <h3 class="text-3xl"> {{$category->title}} </h3> 
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
            value={{$category->id}} 
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="name">Title:</label>
        <input type="text" 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            name="name" 
            id="name" 
            @disabled(request()->routeIs('categories.show')) 
            value={{$category->title}}
        />
    </div>
    <div class="m-2 flex gap-3 justify-between">
        @if (request()->routeIs('categories.edit'))
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
            ><a href="{{ route('categories.index') }}">Назад</a></button>
        @else
        <button
            class="p-2 w-max rounded-full 
            bg-slate-500 text-cyan-50 
            hover:bg-slate-300 hover:text-zinc-600 
            hover:transition"
        ><a href="{{ route('categories.index') }}">Назад</a></button>
        @endif
    </div>
</form>