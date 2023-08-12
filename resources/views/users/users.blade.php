<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>Users</title>
</head>
<body>

    @include('components.navbar')

    <div class="mx-auto max-w-7xl">
        <h1 class="text-4xl m-10 inline-block">Users</h1>
        <a href="{{route('signup')}}">
            <button class="text-right bg-indigo-600 py-2 px-4 rounded-lg text-white font-semibold">Create user</button>
        </a>
    </div>

    <div class="space-y-12 mx-auto max-w-7xl">
        <ul role="list" class="divide-y divide-gray-100 m-10">
            @foreach($users as $user)
            <a href="{{route("user.show", $user->id)}}">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <img class="h-20 w-20 object-cover flex-none rounded-full bg-gray-50" src="{{ isset($user->image) ? asset('storage/'.$user->image->path) : asset('storage/user_icon.png') }}" alt="User Profile Photo">
                        <div class="min-w-0 flex-auto">
                            <p class="text-lg font-semibold leading-10 text-gray-900">{{$user->name}}</p>
                            <p class="mt-1 truncate text-sm leading-5 text-gray-500">{{$user->email}}</p>
                        </div>
                    </div>
                </li>
            </a>
            @endforeach
        </ul>
    </div>

    @include('components.footer')

</body>
</html>