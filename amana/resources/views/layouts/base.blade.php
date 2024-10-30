<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<style>
    html {
        overflow-y: scroll;
        scrollbar-width: none;
    }
    html::-webkit-scrollbar {
        display: none;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sin titulo')</title>
    <link rel="icon" type="image/x-icon" href="images/logoAmana.ico">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header class=" bg-[#C59139] h-20 flex">
        <div class="hidden xl:flex w-full container mx-auto">
            <div class="min-w-1/3 h-full flex items-center  hover:scale-105 transition-all">
                <x-amana-logo :width="64" />
            </div>
            <div class="min-w-1/3 container h-full mx-auto flex justify-center items-center w-full">
                <ul class="flex gap-14 ">
                    <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100"><a
                            href="{{ route('index.amana') }}" class=" text-white">Inicio</a></li>
                    <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100"><a
                            href="{{ route('productos.index') }}" class=" text-white">Productos</a></li>
                    <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100"><a
                            href="{{ route('contacto.index') }}" class=" text-white">Contacto</a></li>
                    <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100"><a
                            href="{{ route('info.index') }}" class=" text-white">Info</a></li>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100">
                                <a href="{{ route('admin.admin-menu') }}" class="text-white">Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
            <div class="min-w-1/3 flex justify-end items-center gap-2 ">
                <div class="relative inline-block text-left">
                    <button type="button" class="flex items-center justify-end w-full hover:scale-105 transition-all">
                        <div class="inline-flex items-center justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-white w-full"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                            <div class="min-w-fit max-w-20 text-white font-semibold text-lg">
                                @if (Auth::check() && Auth::user()->name)
                                    @php
                                        $nameParts = explode(' ', Auth::user()->name);
                                        $shortName = $nameParts[0];
                                        if (count($nameParts) > 1) {
                                            $shortName .= ' ' . substr(end($nameParts), 0, 1) . '.';
                                        }
                                    @endphp
                                    {{ $shortName }}
                                @endif
                            </div>
                        </div>
                    </button>
                    <div class="relative">
                        <div class="absolute left-0 mt-2 w-40 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-10 focus:outline-none hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            @if (Auth::check())
                                <form method="POST" action="{{ route('logout') }}" role="none">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="menu-item-3">Cerrar Sesión</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="menu-item-0">Iniciar Sesión</a>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="menu-item-1">Registrarse</a>
                            @endif
                        </div>
                    </div>
                </div>
                <a href="{{ route('cart.index') }}" class="hover:scale-105 transition-all ">
                    @auth
                        <svg class="w-12 h-12 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                    @else
                        <svg class="w-16 h-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                        </svg>
                    @endauth
                </a>
            </div>
        </div>
        <div class="xl:hidden flex-col items-center bg-[#C59139] w-full z-50 h-20 fixed top-0 left-0">
            <div id="hamburger-menu"
                class="xl:hidden flex flex-col items-center justify-center bg-[#C59139] w-full pt-4">
                <div class="w-full flex items-center justify-center h-full ">
                    <button id="hamburger-button">
                        <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50"
                            height="50" viewBox="0 0 50 50" fill="white">
                            <path
                                d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <ul id="hamburger-menu-items" class="flex-col p-4 hidden text-center w-64  ">
                    <li
                        class="{{ request()->routeIs('index.amana') ? 'font-extrabold' : '' }} hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                        <a href="{{ route('index.amana') }}" class="text-white">Inicio</a>
                    </li>
                    <li
                        class="{{ request()->routeIs('productos.index') ? 'font-extrabold' : '' }} hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                        <a href="{{ route('productos.index') }}" class="text-white">Productos</a>
                    </li>
                    <li
                        class="{{ request()->routeIs('contacto.index') ? 'font-extrabold' : '' }} hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                        <a href="{{ route('contacto.index') }}" class="text-white">Contacto</a>
                    </li>
                    <li
                        class="{{ request()->routeIs('info.index') ? 'font-extrabold' : '' }} hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                        <a href="{{ route('info.index') }}" class="text-white">Info</a>
                    </li>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                                <a href="{{ route('admin.admin-menu') }}" class="text-white">Admin</a>
                            </li>
                        @endif
                    @endauth
                    <li class="hoverEffectNav duration-1000 text-3xl hover:text-gray-100 mb-6">
                        <a href="{{ route('cart.index') }}" class="text-white">Carrito</a>
                    </li>
                    <hr>
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}" role="none">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 mt-2 text-center text-2xl text-white"
                                role="menuitem" tabindex="-1" id="menu-item-3">Cerrar Sesión</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-center text-2xl text-white" role="menuitem"
                            tabindex="-1" id="menu-item-0">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-center text-2xl text-white"
                            role="menuitem" tabindex="-1" id="menu-item-1">Registrarse</a>
                    @endif
                </ul>
            </div>
    </header>
    <main class="mb-20">
        <div class="container mx-auto ">
            @yield('content')
        </div>
    </main>
    <footer class="mt-auto bg-[#C59139] h-20 ">
        <div class="container h-full mx-auto flex justify-center items-center">
            <p class="text-white font-bold">Todos los derechos reservados</p>
        </div>
    </footer>
</body>
<style>
    .hoverEffectNav:after {
        display: block;
        content: "";
        width: 100%;
        border-bottom: solid 3px white;
        transform: scaleX(0);
        transition: transform 250ms ease-in-out;
    }
    .hoverEffectNav:hover:after {
        transform: scaleX(1);
    }
    .hoverEffectNav:after {
        transform-origin: left;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuButton = document.getElementById('menu-button');
        const dropdownMenu = document.querySelector('.absolute');
        menuButton.addEventListener('click', function() {
            const isHidden = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '';
            dropdownMenu.style.display = isHidden ? 'block' : 'none';
        });
        window.addEventListener('click', function(e) {
            if (!menuButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.getElementById('hamburger-button');
        const hamburgerMenuItems = document.getElementById('hamburger-menu-items');
        hamburgerButton.addEventListener('click', function() {
            hamburgerMenuItems.classList.toggle('hidden');
        });
    });
</script>
</html>
