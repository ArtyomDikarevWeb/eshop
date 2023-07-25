@extends('admin.layouts.main')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="text-center p-3">
                <h3 class="text-3xl"> Create new product </h3>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="product_name">Name:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="name"
                    id="product_name"
                >
            </div>
            <div class="my-1.5 flex items-center">
                <label class="mr-3" for="product_description">Description:</label>
                <textarea 
                    class="px-2 w-80 h-40 border-2 border-slate-700 border-solid rounded" 
                    name="description" 
                    id="product_description"
                ></textarea>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="product_amount">Amount:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"
                    type="number"
                    min="0"
                    name="amount"
                    id="product_amount"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="product_stock_price">Stock price:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"
                    type="number" 
                    min="0" 
                    name="stock_price" 
                    id="product_stock_price"
                >
            </div>
            <div class="my-2 flex gap-3 justify-between">
                <button type="submit"
                        class="
                            p-2 w-max rounded-full 
                            bg-slate-500 text-cyan-50 
                            hover:bg-slate-300 hover:text-zinc-600 
                            hover:transition
                ">Create</button>
                <button 
                    class="
                        p-2 w-max rounded-full 
                        bg-slate-500 text-cyan-50 
                        hover:bg-slate-300 hover:text-zinc-600 
                        hover:transition
                "><a href="{{ route('products.index') }}">Back</a></button>
            </div>
        </form>
    </div>
@endsection