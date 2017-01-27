<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#4FB5A7">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Stack Trackers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
        @stack('styles')
    </head>
    <body>
        @include('partials.navbar')
            @include('partials.flash-messages')
            @yield('main-content')
        
        @include('partials.footer')
        
        <script src="{{ elixir('js/app.js') }}"></script>
        @stack('scripts')
    </body>
</html>
