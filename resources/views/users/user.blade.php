<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>Profile</title>
</head>
<body class="flex flex-col min-h-screen">

    @include('components.navbar')

    <div class="mx-auto max-w-7xl">
        <h1 class="text-4xl m-10 inline-block">Profile</h1>
        <a href="{{route('user.edit', $user->id)}}">
            <button class="text-right bg-indigo-600 py-2 px-4 rounded-lg text-white font-semibold">Edit</button>
        </a>
    </div>

    <div class="flex m-20 justify-center h-screen">
        <div class="flex items-center flex-col text-center">
            <img class="h-44 w-44 object-cover flex-none rounded-full bg-gray-50" src="{{isset($user->image) ? asset('storage/'.$user->image->path) : asset('storage/user_icon.png')}}" alt="Profile picture">
            <h1 class="text-2xl font-bold p-5">{{$user->name}}</h1>
            <p class="text-lg text-gray-600">{{$user->email}}</p>
            <p class="text-lg text-gray-600">{{$user->cellphone}}</p>
        </div>
    </div>

    @include('components.footer')

</body>
</html>
