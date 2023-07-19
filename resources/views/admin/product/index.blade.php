@extends('admin.layouts.main')

@section('content')
    @forelse ($products as $product)
        <div class="p-2.5">{{$product->name}}</div>
    @empty
        <div>А база-то не кормит</div>        
    @endforelse
@endsection