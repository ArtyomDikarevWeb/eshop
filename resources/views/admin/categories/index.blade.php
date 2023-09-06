@extends('admin.layouts.main')

@section('content')
    <div class="w-full grid grid-cols-6 gap-4 p-2.5">
        <div class="text-center">
            <p>ID</p>
        </div>
        <div class="text-center">
            <p>Title</p>
        </div>
        <div class="text-center">
            <p>Created at</p>
        </div>
        <div class="text-center">
            <p>Deleted at</p>
        </div>
        <div class="text-center">
            <p>Edit</p>
        </div>
        <div class="text-center">
            <p>Delete</p>
        </div>
    </div>
    <div class="px-2.5 divide-y divide-slate-700">
        @forelse($categories as $category)
            <x-category :$category/>
        @empty
            <div>Категорий нет</div>        
        @endforelse
    </div>
    <x-pagination-component :paginator="$categories"/>
    <div class="py-4 px-6 w-full flex justify-end">
        <div>
            <a class="
                p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition
            " href="{{ route('categories.create') }}">Создать новую категорию</a>
        </div>
    </div>
@endsection