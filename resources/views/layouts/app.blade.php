<!doctype html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <title>Fakebook -
        @yield('title')</title>
    </head>
    <body>
        <h1>Fakebook - @yield('title')</h1>
        <div>
            @yield('content')
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('panel heading')
            </div>
            <div class="panel-body">
                @yield('panel body')
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>
