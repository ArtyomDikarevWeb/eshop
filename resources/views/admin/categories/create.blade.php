@extends('admin.layouts.main')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="text-center p-3">
                <h3 class="text-3xl"> Создать новую категорию </h3>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="title">Название категории</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="title"
                    id="title"
                >
            </div>
            <div class="my-2 flex gap-3 justify-between">
                <button type="submit"
                        class="
                            p-2 w-max rounded-full 
                            bg-slate-500 text-cyan-50 
                            hover:bg-slate-300 hover:text-zinc-600 
                            hover:transition
                ">Создать</button>
                <button 
                    class="
                        p-2 w-max rounded-full 
                        bg-slate-500 text-cyan-50 
                        hover:bg-slate-300 hover:text-zinc-600 
                        hover:transition
                "><a href="{{ route('categories.index') }}">Назад</a></button>
            </div>
        </form>
    </div>
@endsection