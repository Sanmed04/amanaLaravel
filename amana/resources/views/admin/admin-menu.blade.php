@extends('layouts.base')

@section('title', 'Admin Menu')

@section('content')
<div class="flex justify-center items-center lg:block">

    <x-back-button :href="route('index.amana')"></x-back-button>
</div>
    <div class="lg:flex mx-auto items-center justify-center container text-center">
        <!--
        <div class="flex flex-col justify-center items-center gap-10 h-full w-full my-10 lg:my-0">
            <a href=""
                class="flex flex-col justify-center items-center gap-3 bg-[#C59139] w-[320px] h-[320px] hover:scale-110 transition-all hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                    class="bi bi-person iconoAdminMenu" viewBox="0 0 16 16">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                </svg>
                <p>
                    Usuarios
                </p>
            </a>
            <!--
            <a href=""
                class="flex flex-col justify-center items-center gap-3 bg-[#C59139] w-[320px] h-[320px] hover:scale-110 transition-all hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                    class="bi bi-truck iconoAdminMenu" viewBox="0 0 16 16">
                    <path
                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                </svg>
                <p>
                    Envíos
                </p>
            </a>
        -->
        </div>
        <div class="flex flex-col justify-center items-center gap-10 h-full w-full mt-10">
            <a href="{{ route('admin.admin-productos') }}"
                class="flex flex-col justify-center items-center gap-3 bg-[#C59139] w-[320px] h-[320px] hover:scale-110 transition-all hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                    class="bi bi-box-seam iconoAdminMenu" viewBox="0 0 16 16">
                    <path
                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                </svg>
                <p>
                    Productos
                </p>
            </a>
            <!--
            <a href=""
                class="flex flex-col justify-center items-center gap-3 bg-[#C59139] w-[320px] h-[320px] hover:scale-110 transition-all hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor"
                    class="bi bi-bag iconoAdminMenu" viewBox="0 0 16 16">
                    <path
                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                </svg>
                <p>
                    Pedidos
                </p>
            </a>
        -->
        </div>
    </div>
@endsection
