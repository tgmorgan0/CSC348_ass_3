<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <title>Fakebook - @yield('title')</title>
    </head>

    <body>
        <div class="row">
            <div class="col text-left font-weight-bold">
                <h1>Fakebook - @yield('title')</h1>
                <h3>@yield('welcome')</h3>
            </div>
            <div class="col float-end">
                <form method="GET" action="{{route('logout')}}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Logout">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col card">
                <div class="card-header font-weight-bold">
                    <h5>Create New Post</h5>
                </div>
                @yield('create')
            </div>
            <div class="col">Service Container</div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <h4>Current Post</h4>
                    </div>
                    @yield('posts')
                </div>
                <div class="card">
                    <div class="card-header font-weight-bold">
                        @yield('comments title')
                    </div>
                    @yield('comments')
                </div>
            </div>
            <div class="col">
                <div class="row card">
                    <div class="card-header font-weight-bold">
                        <h5>@yield('note heading')</h5>
                    </div>
                    <div class="card-body">
                        @yield('note body')
                    </div>
                </div>
                <div class="row card">
                    <div class="card-header font-weight-bold">
                        <h5>@yield('inter heading')</h5>
                    </div>
                    <div class="card-body">
                        @yield('inter body')
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @yield('links')
        </div>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>
