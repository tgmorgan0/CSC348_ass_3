<!doctype html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <title>Fakebook -
        @yield('title')</title>
    </head>
    <body>
        <h1>Fakebook - @yield('title')</h1>
        <h3>@yield('welcome')</h3>
        <div>
            @yield('create')
        </div>
        <div>
            @yield('content')
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('note heading')
            </div>
            <div class="panel-body">
                @yield('note body')
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                @yield('inter heading')
            </div>
            <div class="panel-body">
                @yield('inter body')
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>
