@extends('layouts.base')
@section('title', 'Amana')
@section('content')
    <div class="lg:mx-auto mx-4">
        <div class="container mx-auto mt-10 w-full xl:w-1/3 lg:w-2/3">
            <h2 class="text-3xl font-medium mb-4">Contacto</h2>
            <form action="{{ route('contacto.submit') }}" method="POST"
                class="bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" id="name" name="name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" id="email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Mensaje:</label>
                    <textarea id="message" name="message" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Enviar
                    </button>
                </div>
            </form>
            @if ($errors->any())
                <div class="text-red-500 text-center mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div
                    class="fixed inset-x-0 bottom-[4.4rem] flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6">
                    <div x-data="{ show: true }" x-show="show"
                        x-transition:enter="transform ease-out duration-300 transition"
                        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2 sm:opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0 sm:opacity-100"
                        x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0"
                        @click="show = false"
                        class="max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg pointer-events-auto">
                        <div class="rounded-lg shadow-xs overflow-hidden">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3 w-0 flex-1 pt-0.5">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            Mail enviado correctamente
                                        </p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 flex">
                                        <button @click="show = false"
                                            class="bg-white dark:bg-gray-800 rounded-md inline-flex text-gray-400 dark:text-gray-200 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <span class="sr-only">Close</span>
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M14.293 5.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414L10 8.586l4.293-4.293z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
