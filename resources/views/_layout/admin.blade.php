<!doctype html>
<html lang="{{ app()->getLocale() }}">
@include ('_layout.app_head')
<body>

    <div class="wrapper__main">

        @include('head')


        <div class="wrapper__content">
            @include('afterHead')
            <h1>Administrace</h1>
            @include('components/messages')
            @yield('content')

        </div>

        <div class="clearfix"></div>
        @include('footer')
    </div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>

