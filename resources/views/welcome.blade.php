<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('img/un.jpeg') }}" sizes="16x16" type="image/png">

        <title>Plusdatabase</title>
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/material-icons.css') }}">
       <link rel="stylesheet" href="{{ asset('css/main.css') }}">


        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
       
       
    </head>
    <body>
     
        <div id="app">
           <main-app/>
        </div>
   
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/admin.js') }}"></script>

    </body>
</html>
