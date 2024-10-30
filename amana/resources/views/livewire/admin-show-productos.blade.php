<div>
    <div class="flex justify-center items-center lg:block">
        <x-back-button :href="route('admin.admin-menu')"></x-back-button>
    </div>
    <div class="w-full mx-auto h-full flex flex-col items-center justify-center gap-8 mb-10">
        <div class="lg:flex flex-col lg:flex-row w-full mt-10 me-4">
            <div class="w-1/3"></div>
            <div class="lg:w-1/3">
                <h2 class="text-center text-4xl font-bold lg:mx-0 mx-4">Administrar Productos</h2>
            </div>
            <div class="lg:w-1/3 flex justify-center lg:justify-end items-center my-6 lg:my-0lg:items-end">
                <input type="text" placeholder="Busca un producto..." class="rounded" wire:model.live="search">
            </div>
            <div class="flex justify-center items-center">
                <a href="{{ route('admin.admin-crear-producto-form') }}"
                class="lg:hidden visible bg-blue-600 rounded-lg px-4 py-3 text-white hover:bg-blue-700">Agregar
                producto</a>
            </div>
        </div>
        <div class="hidden invisible lg:block lg:visible relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-1/3 lg:w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Categoria</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                        <th scope="col" class="px-6 py-3">Descuento</th>
                        <th scope="col" class="px-6 py-3">Stock</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($productos->isEmpty())
                        <div class="bg-gray-700 text-white pt-3 text-center font-bold">

                            <p>No se encontraron productos para "{{ $search }}"</p>
                        </div>
                    @else
                        @foreach ($productos as $producto)
                            <tr
                                class="odd:bg-white  even:bg-gray-50  border-b ">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap truncate max-w-44">
                                    {{ $producto->nombre }}
                                </th>
                                <td class="px-6 py-4 truncate max-w-32">
                                    {{ $producto->categoria->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    ${{ $producto->precio }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $producto->descuento }}%
                                </td>
                                <td class="px-6 py-4">
                                    {{ $producto->stock }}
                                </td>
                                <td class="px-6 py-4 w-40">
                                    <a href="{{ route('admin.admin-editar-producto', $producto) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline me-1">Editar</a>
                                    <form action="{{ route('admin.admin-eliminar-producto', $producto->id) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('productos.show', $producto) }}"
                                        class="me-2 px-3 py-2 rounded font-bold text-white bg-green-600  hover:bg-green-700 text-center">Ver
                                        Producto</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $productos->links() }}
        </div>
        <div class="lg:hidden relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500  mx-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  hidden lg:table-header-group">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Categoria</th>
                        <th scope="col" class="px-6 py-3">Precio</th>
                        <th scope="col" class="px-6 py-3">Descuento</th>
                        <th scope="col" class="px-6 py-3">Stock</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @if ($productos->isEmpty())
                        <tr>
                            <td colspan="7" class="bg-gray-700 text-white pt-3 text-center font-bold">
                                No se encontraron productos para "{{ $search }}"
                            </td>
                        </tr>
                    @else
                        @foreach ($productos as $producto)
                            <tr class="bg-white  border-b  lg:table-row flex flex-col lg:flex-row mb-4 lg:mb-0">
                                <td data-label="Nombre" class="px-6 py-4 font-medium text-gray-900  truncate flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Nombre:</span>
                                    {{ $producto->nombre }}
                                </td>
                                <td data-label="Categoria" class="px-6 py-4 truncate flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Categoria:</span>
                                    {{ $producto->categoria->nombre }}
                                </td>
                                <td data-label="Precio" class="px-6 py-4 flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Precio:</span>
                                    ${{ $producto->precio }}
                                </td>
                                <td data-label="Descuento" class="px-6 py-4 flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Descuento:</span>
                                    {{ $producto->descuento }}%
                                </td>
                                <td data-label="Stock" class="px-6 py-4 flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Stock:</span>
                                    {{ $producto->stock }}
                                </td>
                                <td data-label="Acciones" class="px-6 py-4 w-40 flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Acciones:</span>
                                    <a href="{{ route('admin.admin-editar-producto', $producto) }}" class=" ms-20 sm:ms-36 font-medium text-blue-600 dark:text-blue-500 hover:underline me-1">Editar</a>
                                    <form action="{{ route('admin.admin-eliminar-producto', $producto->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                                <td data-label="Ver Producto" class="px-6 py-4 flex justify-between lg:table-cell">
                                    <span class="lg:hidden font-bold">Ver Producto:</span>
                                    <a href="{{ route('productos.show', $producto) }}" class="me-2 px-3 py-2 rounded font-bold text-white bg-green-600 hover:bg-green-700 text-center ms-3">Ver Producto</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $productos->links() }}
        </div>
    </div>
    <a href="{{ route('admin.admin-crear-producto-form') }}"
        class="hidden lg:visible absolute 2xlabsolute 2xl:right-52 2xl:bottom-28 bg-blue-600 rounded-lg px-4 py-3 text-white hover:bg-blue-700">Agregar
        producto</a>
    @if (session('status'))
        <div class="fixed inset-x-0 bottom-[4.4rem] flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6">
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2 sm:opacity-0"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0 sm:opacity-100"
                x-transition:leave="transition ease-in duration-100" x-transition:leave-end="opacity-0"
                @click="show = false"
                class="max-w-sm w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg pointer-events-auto">
                <div class="rounded-lg shadow-xs overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ session('status') }}
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
