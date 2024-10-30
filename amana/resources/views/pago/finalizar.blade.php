@extends('layouts.base')
@section('title', 'Carrito')
@section('content')
    <div class="flex justify-center items-center h-80">
        <div class="block ">
            <h3 class="text-xl lg:text-3xl text-center">
                Estamos procesando su pago, por favor espere...
            </h3>
            <div class="w-full flex items-center justify-center pt-10">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "{{ route('index.amana') }}";
        }, 3000);
    </script>
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
