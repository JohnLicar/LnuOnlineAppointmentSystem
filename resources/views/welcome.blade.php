<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('images/logo/LNU.png') }}" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
       <!-- Styles -->
       <link href="{{ asset('css/loading.css') }}" rel="stylesheet" type="text/css" >
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">

       <!-- Scripts -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       <script src="{{ asset('js/app.js') }}" defer></script>
       @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100  border-b border-gray-200">
       <div class="mx-4">
            <x-application-logo-black/>
       </div>
            <div class="grid md:grid-cols-5 sm:grid-cols-1">
               <div class="col-span-3">
                @livewire('appointment-calendar')
               </div>
            </div>
           @livewire('appointment-form')

    </div>

    @livewireScripts
</body>

</html>
