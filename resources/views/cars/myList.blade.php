<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>My list</title>
</head>
<body>

    @include('components.navbar')

    <div class="mx-auto max-w-7xl">
        <h1 class="text-4xl m-10 inline-block">My cars</h1>
    </div>

    <div class="space-y-12 mx-auto max-w-7xl">
        <ul role="list" class="divide-y divide-gray-100 m-10">
            @foreach($cars as $car)
            <a href="{{ route('car.show', $car->id) }}">
                <li class="flex justify-between gap-x-6 py-5">
                    <div class="flex gap-x-4">
                        <img class="h-20 w-20 object-cover flex-none rounded-full bg-gray-50" src="{{ isset($car->images[0]) ? asset('storage/'.$car->images[0]->path) : asset('storage/car_icon.png') }}" alt="User Profile Photo">
                        <div class="min-w-0 flex-auto">
                            <p class="text-lg font-semibold leading-10 text-gray-900">{{ $car->model }}</p>
                            <p class="text-sm mt-1 truncate leading-5 text-gray-500">{{ ucfirst($car->color) }}</p>
                        </div>
                    </div>
                    @if($car->sold == 0)
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-md leading-6 text-gray-900">${{ number_format($car->price) }}</p>
                        <p class="text-sm mt-1 leading-5 text-gray-500">{{ $car->year }}</time></p>
                    </div>
                    @else
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-md leading-6 text-red-500 font-semibold">Sold</p>
                    </div>
                    @endif
                </li>
            </a>
            @endforeach
        </ul>
    </div>

    @include('components.footer')

</body>
</html>