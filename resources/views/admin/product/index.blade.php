@extends('admin.layouts.main')

@section('content')
    <div class="w-full grid grid-cols-9 gap-4 p-2.5">
        <div class="text-center">
            <p>ID</p>
        </div>
        <div class="text-center">
            <p>Name</p>
        </div>
        <div class="text-center">
            <p>Description</p>
        </div>
        <div class="text-center">
            <p>Amount</p>
        </div>
        <div class="text-center">
            <p>Stock price</p>
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
        @forelse($products as $product)
            <x-admin-product :$product/>
        @empty
            <div>А база-то не кормит</div>        
        @endforelse
    </div>
    @if($products->hasPages())
        <div class="w-full flex my-3">
            <div class="flex gap-4 mx-auto">

                @if (!$products->onFirstPage())
                    @if(($products->currentPage() - 1) === 1)
                        <a href="{{$products->url(1)}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ 1 }}</p>
                            </div>
                        </a>
                    @elseif(($products->currentPage() - 1) === 2)
                        <a href="{{$products->url(1)}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ 1 }}</p>
                            </div>
                        </a>
                        <a href="{{$products->previousPageUrl()}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->currentPage() - 1 }}</p>
                            </div>
                        </a>
                    @else
                        <a href="{{$products->url(1)}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ 1 }}</p>
                            </div>
                        </a>
                        <div>...</div>
                        <a href="{{$products->previousPageUrl()}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->currentPage() - 1 }}</p>
                            </div>
                        </a>
                    @endif
                @endif

                <a href="{{$products->url($products->currentPage())}}">
                    <div class="w-10 h-10 bg-slate-800 flex justify-center items-center">
                        <p class="text-green-300 font-bold">{{ $products->currentPage() }}</p>
                    </div>
                </a>

                @if(($products->lastPage() === 2) && ($products->currentPage() !== 2))
                    <a href="{{$products->nextPageUrl()}}">
                        <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                            <p class="text-cyan-50">{{ $products->lastPage() }}</p>
                        </div>
                    </a>
                @elseif($products->lastPage() >= 3 && $products->currentPage() < $products->lastPage())
                    @if(($products->currentPage()) === ($products->lastPage() - 1))
                        <a href="{{$products->url($products->lastPage())}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->lastPage() }}</p>
                            </div>
                        </a>
                    @elseif(($products->currentPage() + 1) === ($products->lastPage() - 1))
                        <a href="{{$products->nextPageUrl()}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->currentPage() + 1 }}</p>
                            </div>
                        </a>
                        <a href="{{$products->url($products->lastPage())}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->lastPage() }}</p>
                            </div>
                        </a>
                    @else
                        <a href="{{$products->nextPageUrl()}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->currentPage() + 1 }}</p>
                            </div>
                        </a>
                        <div>...</div>
                        <a href="{{$products->url($products->lastPage())}}">
                            <div class="w-10 h-10 bg-slate-600 flex justify-center items-center">
                                <p class="text-cyan-50">{{ $products->lastPage() }}</p>
                            </div>
                        </a>
                    @endif
                @endif

            </div>
        </div>
    @endif
    <div class="py-4 px-6 w-full flex justify-end">
        <div>
            <a class="
                p-2 w-max rounded-full 
                bg-slate-500 text-cyan-50 
                hover:bg-slate-300 hover:text-zinc-600 
                hover:transition
            " href="{{ route('products.create') }}">Создать новый продукт</a>
        </div>
    </div>
@endsection