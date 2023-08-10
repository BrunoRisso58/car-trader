<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>Car</title>
</head>
<body>

  @include('components.navbar')

  @if(isset($isByLoggedUser) && !$isSold)
  <div class="mx-auto max-w-7xl">
    <a href="{{ route('car.edit', $car->id) }}">
      <button class="text-right m-10 inline-block bg-indigo-600 py-2 px-4 rounded-lg text-white font-semibold">Edit</button>
    </a>
    <form action="{{ route('car.sold', $car->id) }}" method="POST" class="inline">
      @csrf
      @method('put')
      <button type="submit" class="text-right m-10 inline-block bg-green-200 py-2 px-4 rounded-lg text-gray-800 border-2 border-green-500 font-bold">Mark as sold</button>
    </form>
  </div>
  @endif

  @if($isSold)
  <div class="mx-auto max-w-7xl bg-red-400 text-black font-semibold p-4">
    This car is not available
  </div>
  @endif

  <div class="bg-white">
    <div class="pt-6">
  
      <img src="{{ isset($car->images[0]) ? asset('storage/'.$car->images[0]->path) : asset('storage/car_icon.png')}}" class="max-w-7xl max-h-96 mx-auto object-cover rounded" alt="Car image">
  
      <!-- Product info -->
      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $car->model }}</h1>
        </div>
  
        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h2 class="sr-only">Car information</h2>
          <p class="text-3xl tracking-tight text-gray-900">${{number_format($car->price)}}</p>

          <div class="mt-10">  
              <h3 class="text-sm font-medium text-gray-900">
                Color: {{ strtolower($car->color) }}
              </h3>
          </div>
          <div class="mt-10">
            <h2 class="text-2xl">Contact:</h2>
            <h3 class="mt-4 text-sm font-medium text-gray-900">
              <a href="https://wa.me/{{str_replace(' ', '', $car->user->cellphone)}}?text=I am interested in your car ({{$car->model}}). Please contact me so we can make a deal." target="_blank">
                Phone: 
                <span class="text-indigo-600">{{ $car->user->cellphone }}</span>
              </a>
            </h3>
            <h3 class="mt-4 text-sm font-medium text-gray-900">
              <a href="mailto:{{$car->user->email}}?subject=Car Trader - {{$car->model}}&body=I am interested in your car. Please contact me so we can make a deal.">
                Email: 
                <span class="text-indigo-600">{{ $car->user->email }}</span>
              </a>
            </h3>
          </div>
            
        </div>
  
        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
          <!-- Description and details -->
          <div>
            
            <div class="space-y-4">
              <h3 class="text-sm font-medium text-gray-900">Description</h3>
              <p class="text-base text-gray-900">{{ $car->description }}</p>
            </div>
          </div>
  
          <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Features</h3>
  
            <div class="mt-4">
              <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                @foreach($car->features as $feature)
                <li class="text-gray-400"><span class="text-gray-600">{{ $feature }}</span></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('components.footer')

</body>
</html>