<!DOCTYPE html>
<html lang="en">

    <head>
        
        @include('dashboard.partials.head')

        @yield('css')

    </head>

    <body class="app-filemgr">

        <div class="" id="vueapp">
            
            @include('dashboard.partials.topnav')

            @yield('content')

            @include('dashboard.partials.footer')

        </div>


        @include('dashboard.partials.javascript')
        
        @yield('javascript')


    </body>
</html>