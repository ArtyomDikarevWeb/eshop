@extends('admin.layouts.main')

@section('content')
    <div class="w-full grid grid-cols-9 gap-4 p-2.5">
        <div class="text-center">
            <p>ID</p>
        </div>
        <div class="text-center">
            <p>Title</p>
        </div>
        <div class="text-center">
            <p>Description</p>
        </div>
        <div class="text-center">
            <p>Amount</p>
        </div>
        <div class="text-center">
            <p>Price</p>
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
        @forelse($offers as $offer)
            <x-admin-offer :$offer/>
        @empty
            <div>А база-то не кормит</div>        
        @endforelse
    </div>
    <x-pagination-component :paginator="$offers"/>
    <div class="py-4 px-6 w-full flex justify-end">
        <div>
            <a class="
                p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition
            " href="{{ route('offers.create') }}">Создать новый продукт</a>
        </div>
    </div>
@endsection