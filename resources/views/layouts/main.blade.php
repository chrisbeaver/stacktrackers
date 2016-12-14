<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stack Trackers</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
        
        
        @yield('header-assets')
    </head>
    <body>
        @include('partials.navbar')
        
            @yield('main-content')
        
        @include('partials.footer')
        
        <script src="{{ elixir('js/app.js') }}"></script>
        @yield('footer-assets')
    </body>
</html>
