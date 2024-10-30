<div class="rounded-lg w-64 h-full overflow-hidden shadow-xl relative">
    <a href="{{ route('productos.show', $producto->id) }}" class="w-full">
        @if ($producto->stock == 0)
            <img src="{{ asset('storage/agotadoEtiqueta.png') }}" alt="Agotado"
                class="w-[120px] absolute top-0 left-0 z-10">
            <div class="overflow-hidden h-[216px] flex justify-center w-full">
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                    class="hover:scale-125 ease-in-out duration-300 rounded-t-md grayscale">
            </div>
        @else
            <div class="overflow-hidden h-[216px] flex justify-center w-full">
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                    class="hover:scale-125 ease-in-out duration-300 rounded-t-md ">
            </div>
        @endif
    </a>
    <div class="px-3 py-2">
        <h4 class="truncate text-xl capitalize">{{ $producto->nombre }}</h4>
        <p class="text-gray-400 text-sm mb-2 capitalize">{{ $producto->categoria->nombre }}</p>

        <div class="flex">
            @if ($producto->descuento > 0)
                <div class="flex items-center h-auto bg-green-500 w-fit px-2 py-1 rounded-xl">
                    <p class="text-white font-bold text-sm">{{ $producto->descuento }}% OFF</p>
                </div>
            @else
                <div class="py-3.5"></div>
            @endif
        </div>

        <div class="flex gap-1 mt-1 items-center">
            @if ($producto->descuento > 0)
                @php
                    $precioConDescuento = $producto->precio - $producto->precio * ($producto->descuento / 100);
                @endphp
                <p class="text-xl">$ {{ $precioConDescuento }}.00</p>
                <p class="text-sm line-through text-gray-400">$ {{ $producto->precio }}</p>
            @else
                <p class="text-xl">$ {{ $producto->precio }}</p>
            @endif
        </div>

        @if ($producto->stock == 0)
            <div class="flex justify-center items-center mt-1">
                <div class="bg-gray-400 text-white h-full w-full text-center border-2 border-solid border-gray-400 rounded-lg px-3 py-2">
                    <p class="select-none">Sin Stock</p>
                </div>
            </div>
        @else
            <form action="{{ route('cart.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="number" name="cantidad" value="1" class=" border-none outline-none rounded text-center invisible hidden">
                <div class="flex gap-1 mt-1 items-center">
                    <button type="submit"
                        class="border-blue-600 bg-blue-600 text-white border-2 border-solid rounded-lg px-3 py-2 w-full hover:text-white text-sm hover:bg-blue-700 hover:border-blue-700 ease-in-out duration-300 text-center">
                        Agregar al carrito
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>