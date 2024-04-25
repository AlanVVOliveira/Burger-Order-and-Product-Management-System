<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bem-vindo ao meu aplicativo!
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: rgba(201,49,57,255) border border-gray-300">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Escolha uma opção:</p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                    <span class="mx-2">ou</span>
                    <a href="{{ route('register') }}" class="text-green-500 hover:underline">Registrar</a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
