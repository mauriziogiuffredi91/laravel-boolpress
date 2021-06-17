<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Boolpress</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        
    </head>
    <body>
        {{-- qui dentro non scrivere, solo nel componente app.vue --}}
        <div id="root"></div>

        {{-- JS --}}
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
