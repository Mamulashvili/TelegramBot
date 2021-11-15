<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@if(env('APP_ENV') != 'prod')
    <meta name="robots" content="noindex" />
@else
    <meta name="robots" content="index, follow">
@endif

<link rel="stylesheet" media="all" href="{{asset('assets/css/style.css')}}">
<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>  Telegram Bot </title>