<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="all, follow">

    <title>@yield('title') - {{env('APP_NAME')}}</title>
    <meta name="description" content="@yield('description')"/>

    <link href="{{ mix('/css/app.css') }}" type="text/css" rel="stylesheet">
</head>
