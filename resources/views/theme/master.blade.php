<!DOCTYPE html>
<html lang="en">

@include('theme.partials.head')

<body>
    @include('theme.partials.header')
@csrf

    <main class="site-main">
        @yield('content')
    </main>

    @include('theme.partials.footer')

    @include('theme.partials.script')
</body>

</html>
