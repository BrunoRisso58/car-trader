<!DOCTYPE html>
<html class="h-full bg-white" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Sign Up</title>
</head>
<body class="h-full">
    
  <div>
    <h1 class="text-4xl m-10 inline-block">Sign Up</h1>
    <a href="{{route('users.index')}}">
        <button class="text-right bg-indigo-600 py-2 px-4 rounded-lg text-white font-semibold">Users</button>
    </a>
  </div>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Join Car Trader</h2>
        </div>
      
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="image-preview">
              <img class="mx-auto h-32 w-auto" src="{{asset('storage/user_icon.png')}}" alt="User Icon">
            </div>
            <div class="flex justify-center">
              <input id="image" name="image" type="file" accept=".jpeg, .jpg, .png" class="text-center" onchange="previewImage(event)">
            </div>
            @error('image')
              <span class="text-red-500 text-xs italic" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

            <div>
              <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
              <div class="mt-2">
                <input id="name" name="name" type="text" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('email')
                <span class="text-red-500 text-xs italic" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
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
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm text-gray-500">
            Already registered?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Log in</a>
          </p>
        </div>
    </div>

    <script>

      function previewImage(event) {
            const input = event.target;
            const imagePreview = document.getElementById("image-preview");

            for (const child of imagePreview.children) {
                child.remove();
            }

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('mx-auto', 'h-32', 'w-32', 'object-cover', 'text-gray-300', 'm-4', 'rounded-full');
                    imagePreview.append(img);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

</body>
</html>