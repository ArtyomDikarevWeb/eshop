@extends('admin.layouts.main')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="text-center p-3">
                <h3 class="text-3xl">Создать нового пользователя</h3>
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="email">Email</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="email"
                    id="email"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="email">Телефон</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="phone"
                    id="phone"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="email">Имя на сайте</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="site_name"
                    id="site_name"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="password">Пароль:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="password"
                    id="password"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="repeat_password">Повторите пароль:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="repeat_password"
                    id="repeat_password"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="name">Имя:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="name"
                    id="name"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="surname">Фамилия:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="surname"
                    id="surname"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="last_name">Отчество:</label>
                <input 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    type="text"
                    name="last_name"
                    id="last_name"
                >
            </div>
            <div class="my-1.5">
                <label class="mr-3" for="role_id">Роль:</label>
                <select 
                    class="px-2 border-2 border-slate-700 border-solid rounded"     
                    name="role_id"
                    id="role_id"
                >
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->title}}</option>
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
                ">Создать</button>
                <button 
                    class="
                        p-2 w-max rounded-full 
                        bg-slate-500 text-cyan-50 
                        hover:bg-slate-300 hover:text-zinc-600 
                        hover:transition
                "><a href="{{ route('roles.index') }}">Назад</a></button>
            </div>
        </form>
    </div>
@endsection