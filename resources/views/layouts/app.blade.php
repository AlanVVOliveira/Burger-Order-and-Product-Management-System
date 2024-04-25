<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="{{ asset('js/token.js') }}"></script>
        <script src="{{ asset('js/ordersPlaced.js') }}"></script>
        <script src="{{ asset('js/orderDelivered.js') }}"></script>
        <script src="{{ asset('js/generateTableToCreateOrder.js') }}"></script>
        <script src="{{ asset('js/generateOrder.js') }}"></script>
        <script src="{{ asset('js/disableOrder.js') }}"></script>
        <script src="{{ asset('js/registerNewProduct.js') }}"></script>
        <script src="{{ asset('js/registeredProducts.js') }}"></script>
        <script src="{{ asset('js/disableProduct.js') }}"></script>
        <script src="{{ asset('js/updateProduct.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
