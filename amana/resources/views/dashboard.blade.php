<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#7c591d] text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    {{ __("You're logged in!") }}
                </div>
                <div class="w-full flex flex-col gap-10 items-center justify-center text-white mb-10">
                    Usted esta siendo redirigido a la pagina principal...
                    <div class="loader"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            window.location.href = "/";
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
</x-app-layout>
