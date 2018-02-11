<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap-landing-page.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">

  </head>

  <body background="{{ asset('storage/masjid-landing-page.jpg') }}" style="background-repeat: no-repeat;background-size:100% 100%;">

    @yield('content')

   

  </body>

</html>
