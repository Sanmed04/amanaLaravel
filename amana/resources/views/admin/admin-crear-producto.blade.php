@extends('layouts.base')

@section('title', 'Crear producto')

@section('content')
<div class="flex justify-center items-center lg:block">
    <x-back-button :href="route('admin.admin-productos')"></x-back-button>
</div>

    <form class="max-w-sm mx-auto mt-10 px-4" action="{{ route('admin.admin-crear-producto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="nombre"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
            </label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900  ">Descripcion</label>
            <textarea id="descripcion" rows="4" name="descripcion" value="{{ old('descripcion') }}"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500 max-h-60 min-h-28"
                placeholder="Ingrese aqui la descripcion del producto..."></textarea>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="precio" id="precio" value="{{ old('precio') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="precio"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="descuento" id="descuento" value="{{ old('descuento') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="descuento"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descuento</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="stock"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 " for="imagen">Subir imagen</label>
            <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="imagen" id="imagen" type="file">
            

        </div>

        <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 ">Categorias</label>
        <select id="categoria_id" name="categoria_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            <option value="">Seleccione categoria</option>
            @foreach ($categorias as $categoria)
                <option @selected(old('categoria_id') == $categoria->id) value="{{ $categoria->id }}">
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>



        <button type="submit"
            class="mt-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Guardar</button>

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


@endsection
