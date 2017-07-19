<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('layouts.partials.head')

<body>
    <div id="app">

        @include('layouts.partials.navTop')

        @include('layouts.partials.message')

        @yield('content')

    </div>

    <!-- Scripts -->
    @include('layouts.partials.script')

</body>
</html>
