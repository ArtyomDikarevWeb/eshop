<form @if(request()->routeIs('users.edit')) action="{{ route('users.update', $user->id) }}" method="POST"@endif>
    @if(request()->routeIs('users.edit'))
        @method('PUT')
        @csrf
    @endif
    <div class="text-center p-3">
        @if (request()->routeIs('users.edit'))
            <h3 class="text-3xl"> Редактировать </h3>
        @else
            <h3 class="text-3xl"> {{$user->getFullName()}} </h3>
        @endif
    </div>
    <div class="m-2">
        <label class="mr-3" for="id">ID:</label>
        <input
            class="px-2 border-2 border-slate-700 border-solid rounded"
            type="text"
            name="id"
            id="id"
            disabled
            value="{{$user->id}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="username">Пользовательское имя:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="username"
            id="username"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->username}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="email">Email:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="email"
            id="email"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->email}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="phone">Телефон:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="phone"
            id="phone"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->phone}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="name">Имя:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="name"
            id="name"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->name}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="surname">Фамилия:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="surname"
            id="surname"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->surname}}"
        />
    </div>
    <div class="m-2">
        <label class="mr-3" for="last_name">Отчество:</label>
        <input type="text"
            class="px-2 border-2 border-slate-700 border-solid rounded"
            name="last_name"
            id="last_name"
            @disabled(request()->routeIs('users.show'))
            value="{{$user->last_name}}"
        />
    </div>
    <div class="m-2">
        @if (request()->routeIs('users.edit'))
            <label class="mr-3" for="role_id">Роль:</label>
            <select class="px-2 border-2 border-slate-700 border-solid rounded"
                name="role_id"
                id="role_id"
            >
                <option @selected(!$user->role_id) value=""> Без роли </option>
                @foreach ($roles as $role)
                    <option @selected($user->role_id === $role->id) value="{{$role->id}}">
                        {{$role->title}}
                    </option>
                @endforeach
            </select>
        @else
            <label class="mr-3" for="role_id">Роль:</label>
            <input type="text"
                class="px-2 border-2 border-slate-700 border-solid rounded"
                name="role_id"
                id="role_id"
                @disabled(request()->routeIs('users.show'))
                value="{{$user->role?->title ?? 'Нет роли'}}"
            />
        @endif
    </div>
    <div class="m-2 flex gap-3 justify-between">
        @if (request()->routeIs('users.edit'))
            <button
                class="p-2 w-max rounded-full
                bg-slate-500 text-cyan-50
                hover:bg-slate-300 hover:text-zinc-600
                hover:transition"
                type="submit"
            >Обновить</button>
            <button
                class="p-2 w-max rounded-full
                bg-slate-500 text-cyan-50
                hover:bg-slate-300 hover:text-zinc-600
                hover:transition"
            ><a href="{{ route('users.index') }}">Назад</a></button>
        @else
            <button
                class="p-2 w-max rounded-full
                bg-slate-500 text-cyan-50
                hover:bg-slate-300 hover:text-zinc-600
                hover:transition"
            ><a href="{{ route('users.index') }}">Назад</a></button>
        @endif
    </div>
</form>
