<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Users</title>
</head>
<body>

    <h1 class="text-4xl m-10">User</h1>

    <div class="flex m-20 justify-center h-screen">
        <div class="text-center">
            <img class="h-44 w-44 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile picture">
            <h1 class="text-2xl font-bold p-5">{{$user->name}}</h1>
            <p class="text-lg text-gray-600">{{$user->email}}</p>
        </div>
    </div>

</body>
</html>