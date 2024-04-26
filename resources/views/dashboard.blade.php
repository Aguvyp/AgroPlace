<x-app-layout>
    <x-slot name="header">
        <a href="{{route('home')}}">
            <h1 class="font-semibold text-xl text-black leading-tight text-center" style="text-shadow: 2px 2px 4px rgba(37, 228, 12, 0.767);">
                A       G       R       O       P       L       A       C       E
            </h1>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-opacity-30 bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 flex text-gray-900">
                    <a href=""><img class=" max-w-xs" src="{{ asset('upload/users/diseñosimple.png') }}" alt=""></a>
                    <h1 class="ms-16 font-bold self-center text-xl">!BIENVENIDO A AGROPLACE¡
                        <p class="mt-6">Este es un sitio gratuito donde usted podrá poner un aviso acerca de la herramienta que tenga
                            para alquilar o el servicio que preste. Pudiendo, asi, que el cliente lo contacte para un futuro trabajo, negiocio.
                        </p>
                    </h1>
                </div>
                <div>
                    <a class="flex justify-center max-w-xs rounded-lg mx-auto mb-4 bg-lime-900 bg-opacity-80" href="{{route('tweets.store')}}">Ir a los avisos</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
