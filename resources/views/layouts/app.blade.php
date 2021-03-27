<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Travel Your Way') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="stylesheet" href="{{URL::asset('/admin-master/dist/styles.css')}}">
        <link rel="stylesheet" href="{{URL::asset('/admin-master/dist/all.css')}}">

        <!-- Scripts -->
        <style>
  .register{
    background: url('{{ asset("/admin-master/dist/images/login-new.jpeg")}}')
  }
  </style>  

        
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="register">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
           

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
