<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @yield('title',config('app.name'))
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>

    @include('backend.includes.favicon')
    @include('backend.includes.styles')
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
</head>
