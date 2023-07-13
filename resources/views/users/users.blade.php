<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Users</title>
</head>
<body>

    <h1 class="text-4xl m-10">Users</h1>

    <ul role="list" class="divide-y divide-gray-100 m-10">
        @foreach($users as $user)
        <a href="{{route("user.show", $user->id)}}">
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex gap-x-4">
                    <img class="h-20 w-20 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-lg font-semibold leading-10 text-gray-900">{{$user->name}}</p>
                        <p class="mt-1 truncate text-sm leading-5 text-gray-500">{{$user->email}}</p>
                    </div>
                </div>
            </li>
        </a>
        @endforeach
    </ul>

</body>
</html>