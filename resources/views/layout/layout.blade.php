<!DOCTYPE html>
<html lang="cs">
<head>

    @livewireStyles
    @include('partials._layoutHead')
</head>
<body class="bg-gray-100 text-gray-900 tracking-wider leading-normal"> 
    
        @include('partials._layoutNavbar')
                @yield('content')

                     @livewireScripts


    @include('partials._layoutFooter')
</body>
</html>