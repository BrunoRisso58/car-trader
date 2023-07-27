<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Cars</title>
</head>
<body>

  @include('components.navbar')

  <div class="bg-white">
    <div class="grid grid-cols-4 gap-10 mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

      @foreach($cars as $car)
      <div class="mt-6 grid">
        <div class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src="{{ isset($car->images[0]) ? asset('storage/'.$car->images[0]->path) : asset('storage/car_icon.png') }}" alt="Car image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="#">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  {{ $car->model }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500 capitalize">{{$car->color}}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">$ {{ number_format($car->price) }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>


</body>
</html>