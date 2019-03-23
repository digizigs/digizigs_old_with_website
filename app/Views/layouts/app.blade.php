


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('app.partials.head') 
</head>
<body data-spy="scroll" data-target="#primary-menu">
    
  

    <div id="app">  
        @include('app.partials.preloader')

        @include('app.partials.navigation')

        @yield('content')

		@include('app.partials.contact-form')

        @include('app.partials.footer')

        @include('app.partials.scrolltop')

    </div>
	
    @include('app.partials.scripts')
	
    @yield('javascript')

</body>
</html>
