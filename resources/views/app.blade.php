<!DOCTYPE html>
<html>
<head>
@include('_partials.head')
</head>
<body>
    <div id="root">
        {{-- @include('web._partials.header') --}}
        <main id="main">
            <div id="content">
                @yield('content')
            </div>
            <!-- #content -->
        </main>
        <!-- #main -->
    </div>
    <!-- #root -->
    @include('_partials.footer')
</body>
</html>