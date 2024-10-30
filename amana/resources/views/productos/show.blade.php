@extends('layouts.base')

@section('title', $producto->nombre)

@section('content')
    @php
        $precioFinal = number_format($producto->precio - $producto->descuento, 2, '.', '');
        $descuentoPorcentaje = ceil(($producto->descuento * 100) / $producto->precio);
    @endphp
    <div class="my-4 container flex gap-3 ms-2 mt-2 xl:ms-0 xl:mt-1">
        <a href="{{ route('productos.index') }}" class="font-bold text-blue-500">Volver</a>
        <p> | </p>
        <a href="" class="font-bold text-blue-500">{{ $producto->categoria->nombre }}</a>
    </div>
    <div class="mb-10">
        <div class="block xl:flex mb-5">
            <div class="flex justify-center w-full lg:w-1/2 overflow-hidden mx-auto">
                <div class="overflow-hidden h-[600px] flex items-center">
                    @if ($producto->stock == 0)
                        <div class="h-full">
                            <img src="{{ asset('storage/agotadoEtiqueta.png') }}" alt="Agotado"
                                class="w-[200px] absolute z-10">
                        </div>
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="hover:scale-125 ease-in-out duration-300 w-[500px] grayscale">
                    @else
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                            class="hover:scale-125 ease-in-out duration-300 w-[500px] ">
                    @endif
                </div>
            </div>
            <div class="flex flex-col xl:w-1/2 mx-4 xl:ms-0">
                <h1 class="text-5xl "> {{ $producto->nombre }}</h1>
                <p class="text-gray-400 text-lg mb-3 mt-1 capitalize"> {{ $producto->categoria->nombre }}</p>
                @if ($producto->descuento > 0)
                    <p class="text-xl text-gray-500 line-through	"> $ {{ $producto->precio }}</p>
                @endif
                <span class="flex gap-2">
                    <p class="text-4xl font-bold"> $ {{ $precioFinal }}</p>

                    @if ($producto->descuento > 0)
                        <div class="h-full flex items-center justify-center">
                            <p class="text-green-500 font-bold text-lg"> {{ $descuentoPorcentaje }}% OFF</p>
                        </div>
                    @endif

                </span>
                <div class="my-10">
                    @if ($producto->stock > 0)
                        <p class="text-green-500 font-bold text-lg">Stock disponible</p>
                    @else
                        <p class="text-red-500 font-bold text-lg">Sin stock</p>
                    @endif

                </div>
                <div class="block sm:flex text-center text-lg gap-2 h-40 xl:w-4/5 mx-auto xl:m-0">
                    @if ($producto->stock > 0)
                        <div class="h-1/2">
                            <form action="{{ route('cart.update', $producto->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="cantidad" value="1"
                                    class=" border-none outline-none rounded text-center invisible hidden">
                                <div class="flex gap-1 mt-1 items-center">
                                    <button type="submit"
                                        class="border-blue-600 bg-blue-600 text-white border-2 border-solid rounded-lg px-16 py-3 xl:px-8 w-full hover:text-white hover:bg-blue-700 hover:border-blue-700 ease-in-out duration-300 text-center">
                                        Agregar al carrito
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="px-16 py-4 xl:px-8 bg-gray-300 rounded-xl text-white xl:w-4/5 w-full">Agregar al carrito
                        </div>
                    @endif
                </div>

                <div class="mt-6">
                    <p class="font-bold">Medios de Envio</p>
                    <ul class="list-disc ms-5">
                        <li class="my-2">
                            Retiro en persona <span class="text-sm text-gray-500">(Lunes a viernes, 15-18hs)</span>
                        </li>
                        <li>
                            Envios particulares salen los miercoles <span class="text-sm text-gray-500">(Correo
                                Argentino)</span>
                        </li>
                    </ul>
                </div>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('admin.admin-editar-producto', $producto) }}"
                            class="mt-10 sm:mt-auto sm:ms-auto px-3 py-2 bg-blue-500 rounded-xl text-white hover:bg-blue-600">
                            Editar producto
                        </a>
                    @endif
                @endauth
            </div>
        </div>
        <hr class="mt-10 mb-5">
        <div class="text-center">
            <h3 class="text-2xl">
                Descripción
            </h3>
            <p class="text-gray-500 mt-3">
                {{ $producto->descripcion }}
            </p>
        </div>
        <hr class="mt-10 mb-5">
    </div>
@endsection
