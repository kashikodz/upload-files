<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl  mx-auto sm:px-6 lg:px-8">
{{--        <div class="w-2/6">--}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

{{--                Form begin--}}
                <div class="p-6 bg-white border-b border-gray-200">


                    <div>
                            <div class="mt-5 md:col-span-2 md:mt-0">
                                <form action="{{'upload'}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                            @if($errors->any())
                                                {!! implode('', $errors->all('<div style="color:red;"">:message</div>')) !!}
                                            @endif
                                            <div class="grid grid-cols-3 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first-name" class="block text-sm font-medium text-gray-700">File title *</label>
                                                    <input type="text" name="name" id="first-name" autocomplete="given-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="first-name" class="block text-sm font-medium text-gray-700">Upload File *</label>

{{--                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload file *</label>--}}
                                                <input class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" name="file" id="file_input" type="file">
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 text-centerS sm:px-6">
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
{{--Form End--}}


















                </div>
            </div>
        </div>







    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <!--
      This example requires some changes to your config:

      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->
    <!--
      This example requires some changes to your config:

      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->
    <!--
      This example requires some changes to your config:

      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->
    <div class="bg-white">
        <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">All Images</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($images as $image)
                <div class="group relative">
                    <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
{{--                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">--}}
                            <img src="{{ asset('/storage/uploads/'.$image->file_name) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="{{asset('/download_single/'.$image->file_name)}}">
{{--                                    <span aria-hidden="true" class="absolute inset-0"></span>--}}
{{--                                    {{$image->file_name}}--}}
                                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                    <span>Download</span>
                                </button>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach

{{--                <div class="group relative">--}}
{{--                    <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">--}}
{{--                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">--}}
{{--                    </div>--}}
{{--                    <div class="mt-4 flex justify-between">--}}
{{--                        <div>--}}
{{--                            <h3 class="text-sm text-gray-700">--}}
{{--                                <a href="#">--}}
{{--                                    <span aria-hidden="true" class="absolute inset-0"></span>--}}
{{--                                    Basic Tee--}}
{{--                                </a>--}}
{{--                            </h3>--}}
{{--                            <p class="mt-1 text-sm text-gray-500">Black</p>--}}
{{--                        </div>--}}
{{--                        <p class="text-sm font-medium text-gray-900">$35</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- More products... -->
            </div>
        </div>
    </div>



    </div>






</x-app-layout>
