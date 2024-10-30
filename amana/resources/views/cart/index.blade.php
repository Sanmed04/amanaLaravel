@extends('layouts.base')
@section('title', 'Carrito')
@section('content')
    <h2 class="text-center font-bold text-4xl mt-10 mb-5 xl:mb-0">
        Carrito
    </h2>
    <div class="xl:flex block">
        <div class="hidden xl:block mt-10 w-full ">
            <table class="w-full text-sm text-left rtl:text-right min-h-52">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Producto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>

                        <th scope="col" class="px-6 py-3" colspan="2">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3 ">

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $producto)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $producto['nombre'] }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $descuento = isset($producto['descuento']) ? $producto['descuento'] : 0;
                                    $precioConDescuento = $producto['precio'] * (1 - $descuento / 100);
                                @endphp
                                <div class="text-sm text-gray-900">${{ number_format($precioConDescuento, 2) }}</div>
                            </td>

                            <td class="px-6">

                                    <form action="{{ route('cart.update', $key) }}" method="POST" class="">
                                        @csrf
                                        @method('PUT')
                                        <div class="block xl:flex justify-center items-center mt-1">
                                            <input type="number" name="cantidad" value="{{ $producto['cantidad'] }}"
                                                min="1"
                                                class="border-gray-300 rounded-lg px-3 py-2 text-center w-24">
                                            <button type="submit"
                                                class="ml-2 border-blue-600 bg-blue-600 text-white border-2 border-solid rounded-lg px-3 py-2 hover:text-white hover:bg-blue-700 hover:border-blue-700 ease-in-out duration-300 text-center">
                                                Actualizar
                                            </button>
                                        </div>
                                    </form>

                            </td>
                            <td class="px-6">
                                <form action="{{ route('cart.destroy', $key) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex justify-center items-center mt-1">
                                        <button type="submit"
                                            class="border-red-600 bg-red-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full hover:text-white hover:bg-red-700 hover:border-red-700 ease-in-out duration-300 text-center">
                                            Eliminar
                                        </button>
                                    </div>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="xl:hidden relative overflow-x-auto shadow-md sm:rounded-lg mx-4">
            <table class="w-full text-sm text-left rtl:text-right min-h-52">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 hidden lg:table-header-group">
                    <tr>
                        <th scope="col" class="px-6 py-3">Producto</th>
                        <th scope="col" class="px-6 py-3">Precio</th>

                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $key => $producto)
                        <tr class="bg-white lg:table-row flex flex-col lg:flex-row mb-4 lg:mb-0">
                            <td data-label="Producto"
                                class="px-6 py-4 whitespace-nowrap flex justify-between lg:table-cell">
                                <span class="lg:hidden font-bold">Producto:</span>
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $producto['nombre'] }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Precio" class="px-6 py-4 whitespace-nowrap flex justify-between lg:table-cell">
                                <span class="lg:hidden font-bold">Precio:</span>
                                @php
                                    $descuento = isset($producto['descuento']) ? $producto['descuento'] : 0;
                                    $precioConDescuento = $producto['precio'] * (1 - $descuento / 100);
                                @endphp
                                <div class="text-sm text-gray-900">${{ number_format($precioConDescuento, 2) }}</div>
                            </td>
                            <td class="px-6">
                                <form action="{{ route('cart.update', $key) }}" method="POST" class="">
                                    @csrf
                                    @method('PUT')
                                    <div class="block xl:flex justify-center items-center mt-1">
                                        <input type="number" name="cantidad" value="{{ $producto['cantidad'] }}"
                                            min="1" class="border-gray-300 rounded-lg px-3 py-2 w-full text-center">
                                        <button type="submit"
                                            class="my-3 border-blue-600 bg-blue-600 text-white border-2 border-solid rounded-lg px-3 py-2 hover:text-white hover:bg-blue-700 hover:border-blue-700 ease-in-out duration-300 text-center w-full">
                                            Actualizar
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td data-label="Eliminar" class="px-6 flex justify-between lg:table-cell">
                                <span class="lg:hidden font-bold">Eliminar:</span>
                                <form action="{{ route('cart.destroy', $key) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex justify-center items-center mt-1">
                                        <button type="submit"
                                            class="border-red-600 bg-red-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full hover:text-white hover:bg-red-700 hover:border-red-700 ease-in-out duration-300 text-center">
                                            Eliminar
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full flex justify-center xl:justify-end mt-10 xl:mt-0">
            <div class="w-full xl:w-2/3 px-6 py-4 border rounded-xl shadow-xl mx-4">
                <div class="flex justify-center items-center">
                    <div class=" text-2xl font-bold">
                        Resumen de compra
                    </div>
                </div>
                <hr class="my-6">
                <div class="flex justify-center items-center">
                    <div class="
                    text-2xl font-bold">
                        Subtotal: ${{ number_format($total, 2) }}
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="
                    text-2xl font-normal">
                        Envio gratis
                    </div>
                </div>

                <hr class="my-6">

                <div class="flex justify-center items-center gap-2">
                    <div class="text-2xl font-bold">
                        Total a pagar:
                    </div>
                    <p class="text-xl">${{ number_format($total, 2) }}</p>
                </div>
                <div class="w-full flex mt-10">
                    @if (empty($cart))
                        <button
                            class="border-green-600 bg-green-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full cursor-not-allowed opacity-50 text-center"
                            disabled>
                            Finalizar Compra
                        </button>
                    @else
                        <a href="{{ route('pago.finalizar') }}"
                            class="border-green-600 bg-green-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full hover:text-white hover:bg-green-700 hover:border-green-700 ease-in-out duration-300 text-center">
                            Finalizar Compra
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="xl:w-full flex justify-start mt-10 ms-4 xl:ms-0">
        <a href="{{ route('cart.clear') }}"
            class="border-red-600 bg-red-600 text-white border-2 border-solid rounded-lg px-3 py-2 hover:text-white hover:bg-red-700 hover:border-red-700 ease-in-out duration-300 text-center">
            Vaciar Carrito
        </a>


    </div>

@endsection
