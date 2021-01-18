<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
        .img-teste {
            background-image: url('image/photo-wide-4.jpg');
        }
        .img-forms {
            background-size: cover;
            background-image: url('image/photo-long-3.jpg');
        }
        </style>

        <link href="{{ asset('css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
   {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet"> --}}
        <link href="{{ asset('css/themes/lite-purple.min.css') }}" rel="stylesheet">
    </head>
    <body>
        @yield('content')

        <script src="{{ asset('js/plugins/jquery-3.3.1.min.js') }}"> </script>
        <script src="{{ asset('js/plugins/bootstrap.bundle.min.js') }}"> </script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"> </script>
        <script src="{{ asset('js/scripts/customizer.script.min.js') }}"> </script>
        <script src="{{ asset('js/scripts/script.min.js') }}"> </script>
        <script src="{{ asset('js/scripts/form.validation.script.min.js') }}"></script>
    </body>
</html>
