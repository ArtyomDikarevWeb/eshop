@extends('admin.layouts.main')

@section('content')
<div class="w-full h-full flex justify-center items-center">
    <x-user-edit :$user/>
</div>
@endsection