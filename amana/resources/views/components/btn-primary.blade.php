@props(['href'])

<a href="{{ $href }}" class="border-blue-600 bg-blue-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full hover:text-white hover:bg-blue-700 hover:border-blue-700 ease-in-out duration-300 text-center">
    {{ $slot }}
</a>