<form @if(request()->routeIs('products.edit')) action="{{ route('products.update', $product->id) }}" method="POST"@endif>
    @if(request()->routeIs('products.edit'))
        @method('PUT')
        @csrf
    @endif
    <div class="text-center p-3">
        <h3 class="text-3xl"> Edit </h3>
    </div>
    <div class="m-2">
        <label class="mr-3" for="product_id">ID:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="id" 
            id="product_id" 
            disabled
            value={{$product->id}} 
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="product_name">Name:</label>
        <input type="text" 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            name="name" 
            id="product_name" 
            @disabled(request()->routeIs('products.show')) 
            value={{$product->name}}
        />
    </div>
    <div class="m-2 flex items-center">
        <label class="mr-3" for="product_description">Description:</label>
        <textarea 
            class="px-2 w-80 h-40 border-2 border-slate-700 border-solid rounded" 
            name="description" 
            id="product_description" 
            @disabled(request()->routeIs('products.show'))
            >
            {{$product->description}}
        </textarea>
    </div>
    <div class="m-2">
        <label class="mr-3" for="product_amount">Amount:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="amount" 
            id="product_amount" 
            @disabled(request()->routeIs('products.show')) 
            value={{$product->amount}}
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="product_stock_price">Stock price:</label>
        <input 
            class="px-2 border-2 border-slate-700 border-solid rounded" 
            type="text" 
            name="stock_price" 
            id="product_stock_price" 
            @disabled(request()->routeIs('products.show')) 
            value={{$product->stock_price}}
        />
    </div>
    <div class="m-2 flex gap-3 justify-between">
        @if (request()->routeIs('products.edit'))
            <button 
                class="p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition" 
                type="submit"
            >Update</button>
            <button
                class="p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition"
            ><a href="{{ route('products.index') }}">Back</a></button>
        @else
        <button
            class="p-2 w-max rounded-full 
            bg-slate-500 text-cyan-50 
            hover:bg-slate-300 hover:text-zinc-600 
            hover:transition"
        ><a href="{{ route('products.index') }}">Back</a></button>
        @endif
    </div>
</form>