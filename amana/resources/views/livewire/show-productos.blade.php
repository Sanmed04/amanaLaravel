<div>
    <div class="grid lg:grid-cols-2 justify-center">
        <h1 class="text-5xl	my-5 text-center lg:text-start">Lista productos</h1>
        <div class="flex justify-center lg:justify-end items-center mb-4 lg:mb-0">
            <input type="text" placeholder="Busca un producto..." class="rounded"
                wire:model.live.debounce.800ms="search">
        </div>
    </div>
    <hr class="mb-5">
    <div class="flex flex-wrap justify-center 2xl:justify-normal gap-10">
        @if ($productos->isEmpty())
            <div class="pt-3 text-center font-bold w-full text-3xl">
                <p>No se encontraron productos para {{ $search }}</p>
            </div>
        @else
            @foreach ($productos as $producto)
                <div class="mt-4 lg:mt-0">
                    <x-card-producto :producto="$producto" />
                </div>
            @endforeach
        @endif
    </div>
</div>
