<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('storage/car_favicon.png')}}">
    @vite('resources/css/app.css')
    <title>List a car!</title>
</head>
<body>

    @include('components.navbar')

    <form action="{{route('car.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-12 mx-auto max-w-7xl">
        
            <div class="m-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3 inline-block">
                    <label for="brand" class="block text-sm font-medium leading-6 text-gray-900">Brand *</label>
                    <div class="mt-2">
                        <select id="brand" name="brand" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                            <option value="default" id="default" class="brand"></option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="model" class="block text-sm font-medium leading-6 text-gray-900">Model *</label>
                    <div class="mt-2">
                        <select id="model" name="model" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" required>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="color" class="block text-sm font-medium leading-6 text-gray-900">Color *</label>
                    <div class="mt-2">
                        <input type="text" name="color" id="color" class="block w-2/3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price *</label>
                    <div class="relative mt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <p class="flex items-center w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/p" fill="none" viewBox="0 0 20 20">$</p>
                        </div>
                        <input type="number" name="price" id="price" class="block w-2/3 rounded-md border-0 px-8 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>                    </div>
                </div>
                
                <div class="col-span-full">
                    <label for="features" class="block text-sm font-medium leading-6 text-gray-900">Features</label>
                    <div class="mt-2 grid grid-cols-3">
                        <div>
                            <input id="air-conditioning" name="air-conditioning" value="Air conditioning" type="checkbox" class="m-4">
                            <label for="air-conditioning">Air conditioning</label>
                        </div>
                        <div>
                            <input id="heating-system" name="heating-system" value="Heating system" type="checkbox" class="m-4">
                            <label for="heating-system">Heating system</label>
                        </div>
                        <div>
                            <input id="power-windows" name="power-windows" value="Power windows" type="checkbox" class="m-4">
                            <label for="power-windows">Power windows</label>
                        </div>
                        <div>
                            <input id="power-mirrors" name="power-mirrors" value="Power mirrors" type="checkbox" class="m-4">
                            <label for="power-mirrors">Power mirrors</label>
                        </div>
                        <div>
                            <input id="central-locking" name="central-locking" value="Central locking" type="checkbox" class="m-4">
                            <label for="central-locking">Central locking</label>
                        </div>
                        <div>
                            <input id="sound-system" name="sound-system" value="Sound system" type="checkbox" class="m-4">
                            <label for="sound-system">Sound system</label>
                        </div>
                        <div>
                            <input id="abs" name="abs" value="ABS" type="checkbox" class="m-4">
                            <label for="abs">ABS</label>
                        </div>
                        <div>
                            <input id="traction-control" name="traction-control" value="Traction control" type="checkbox" class="m-4">
                            <label for="traction-control">Traction control</label>
                        </div>
                        <div>
                            <input id="rear-view" name="rear-view" value="Rear-view cameras" type="checkbox" class="m-4">
                            <label for="rear-view">Rear-view cameras</label>
                        </div>
                        <div>
                            <input id="cruise-control" name="cruise-control" value="Cruise control" type="checkbox" class="m-4">
                            <label for="cruise-control">Cruise control</label>
                        </div>
                        <div>
                            <input id="gps-navigation" name="gps-navigation" value="GPS navigation" type="checkbox" class="m-4">
                            <label for="gps-navigation">GPS navigation</label>
                        </div>
                        <div>
                            <input id="keyless-entry" name="keyless-entry" value="Keyless entry/start" type="checkbox" class="m-4">
                            <label for="keyless-entry">Keyless entry/start</label>
                        </div>
                    </div>
                </div>
        
                <div class="col-span-full">
                    <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the car.</p>
                </div>
                
                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo *</label>
                    <div id="image-preview">
                        <svg class="mx-auto h-32 w-auto text-gray-300" id="bg-svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex justify-center">
                        <input id="image" name="image" type="file" accept=".jpeg, .jpg, .png" class="text-center" onchange="previewImage(event, 32, 'md')" required>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600" id="photo-preview-text">This is the first photo that will appear.</p>
                </div> 

                <input type="hidden" name="features" id="features" value="">
            </div>

        </div>
    
        <div class="mt-6 px-12 pb-12 flex items-center justify-end gap-x-6">
            <a href="{{route('cars.index')}}">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            </a>
            <button onclick="submitForm(event)" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>

    </form>

    @include('components.footer')

    <script src="{{ asset('js/brandsRequest.js') }}"></script>
    <script src="{{ asset('js/modelsRequest.js') }}"></script>
    <script src="{{ asset('js/previewImage.js') }}"></script>
    <script src="{{ asset('js/submitCarForm.js') }}"></script>

</body>
</html>