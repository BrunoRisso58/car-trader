<!DOCTYPE html>
<html class="h-full bg-white" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>Edit user</title>
</head>
<body class="h-full">

  @include('components.navbar')
    
  <div class="mx-auto max-w-7xl">
    <h1 class="text-4xl m-10 inline-block">Edit</h1>
    @if(Auth::user()->permission_id == 1)
      <a href="{{route('users.index')}}">
          <button class="text-right bg-indigo-600 py-2 px-4 rounded-lg text-white font-semibold">Users</button>
      </a>
    @endif
  </div>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div id="image-preview">
              <img class="mx-auto h-44 w-44 object-cover flex-none rounded-full bg-gray-50" src="{{asset('storage/'.$user->image->path)}}" alt="User Icon">
            </div>
            <div class="flex justify-center">
              <input id="image" name="image" type="file" accept=".jpeg, .jpg, .png" onchange="previewImage(event, 44, 'full')" class="text-center">
            </div>
            @error('image')
              <span class="text-red-500 text-xs italic" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div>
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
              <div class="mt-2">
                <input id="name" name="name" type="text" value="{{$user->name}}" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('name')
                <span class="text-red-500 text-xs italic" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" value="{{$user->email}}" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('email')
                <span class="text-red-500 text-xs italic" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div>
              <label for="cellphone" class="block text-sm font-medium leading-6 text-gray-900">Phone number:</label>
              <div class="mt-2">
                <input id="cellphone" name="cellphone" type="tel" value="{{$user->cellphone}}" autocomplete="tel" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('cellphone')
                <span class="text-red-500 text-xs italic" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900"> New password</label>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('password')
                <span class="text-red-500 text-xs italic" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm password</label>
              </div>
              <div class="mt-2">
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </form>
      
        </div>
    </div>

    @include('components.footer')

    <script src="{{ asset('js/previewImage.js') }}"></script>

</body>
</html>