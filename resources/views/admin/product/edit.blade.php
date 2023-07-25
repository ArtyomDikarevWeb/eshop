@extends('admin.layouts.main')

@section('content')
<div class="w-full h-full flex justify-center items-center">
    <x-admin-product-edit :$product />
</div>
@endsection