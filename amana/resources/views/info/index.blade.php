@extends('layouts.base')
@section('title', 'Amana')
@section('content')
    <h1 class=" font-bold text-center my-10 animate-pulse-scale text-6xl lg:text-[80px]">Amana</h1>
    <div class="mb-16 text-center lg:text-start mx-4 lg:mx-0">
        Bienvenidos a Amana Tienda Natural, tu destino confiable para productos naturales y ecológicos. Desde nuestros
        inicios, hemos estado comprometidos con ofrecer a nuestros clientes una selección cuidadosamente curada de productos
        que promueven una vida saludable y sostenible.
    </div>
    <div class="flex flex-col justify-center lg:items-start gap-10">
        <div class="bg-[#C59139] rounded-full max-w-64 py-14 mb-4 transition-transform duration-500 mx-auto" id="logoAmana">
            <img src="{{ asset('images/logoAmana.png') }}" alt="Amana" class="h-full">
        </div>
        <div id="texto" class="texto hidden max-w-[600px] pt-6 text-center lg:text-start mx-4 lg:mx-0">
            En Amana Tienda Natural, nuestra misión es proporcionar productos de alta calidad que respeten tanto tu salud
            como el medio ambiente. Creemos firmemente en el poder de los ingredientes naturales y en la importancia de
            adoptar prácticas ecológicas en nuestra vida diaria. Por eso, cada uno de nuestros productos es seleccionado con
            el mayor cuidado, garantizando que cumplen con nuestros estrictos estándares de sostenibilidad y eficacia.
        </div>
    </div>
    <script>
        document.getElementById('logoAmana').addEventListener('mouseover', function() {
            document.getElementById('texto').classList.remove('hidden');
            this.classList.add('rotate-[360deg]');
        });
        document.getElementById('logoAmana').addEventListener('mouseout', function() {
            document.getElementById('texto').classList.add('hidden');
            this.classList.remove('rotate-[360deg]');
        });
    </script>
    <style>
        @keyframes pulse-scale {
            0%,
            100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        .animate-pulse-scale {
            animation: pulse-scale 3s infinite;
        }
    </style>
@endsection
