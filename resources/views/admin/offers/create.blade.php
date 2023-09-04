@extends('admin.layouts.main')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <form action="{{ route('offers.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="text-center p-3">
                <h3 class="text-3xl"> Create new offer </h3>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="title">Title</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="title"
                    id="title"
                >
            </div>
            <div class="my-1.5 flex items-center">
                <label class="mr-3" for="description">Description:</label>
                <textarea 
                    class="px-2 w-80 h-40 border-2 border-slate-700 border-solid rounded" 
                    name="description" 
                    id="description"
                ></textarea>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="amount">Amount:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"
                    type="number"
                    min="0"
                    name="amount"
                    id="amount"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="price">Price:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"
                    type="number" 
                    min="0" 
                    name="price" 
                    id="price"
                >
            </div>

            <div class="my-1.5">
                <label class="mr-3" for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
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
                "><a href="{{ route('offers.index') }}">Back</a></button>
            </div>
        </form>
    </div>
@endsection