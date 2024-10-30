@extends('layouts.base')
@section('title', 'Amana')
@section('content')
    <div class="">
        <div class="shadow-custom rounded-xl mt-7 p-5 pb-6">
            <div class="w-full">
                <h2 class="text-center lg:text-start text-3xl font-medium mb-4">
                    Productos nuevos
                </h2>
            </div>
            <x-slide-producto :productos="$productosNuevos" id="nuevos" />
        </div>
        <div class="shadow-custom rounded-xl mt-7 p-5 pb-6">
            <div class="w-full">
                <h2 class="text-center lg:text-start text-3xl font-medium mb-4">
                    Productos en oferta
                </h2>
            </div>
            <x-slide-producto :productos="$productosOferta" id="oferta" />
        </div>
        <div class="text"></div>
        <div class="shadow-custom rounded-xl mt-7 p-5 pb-6">
            <div class="w-full">
                <h2 class="text-center lg:text-start text-3xl font-medium mb-4">
                    Productos en oferta 2
                </h2>
            </div>
            <x-slide-producto :productos="$productosOferta" id="oferta2" />
        </div>
    </div>
@endsection
