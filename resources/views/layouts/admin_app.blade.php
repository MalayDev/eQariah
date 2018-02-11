<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="stylesheet " type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?= asset('vendor/components/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom Theme files -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">

    {{--  <script src="{{ asset('js/admin/jquery.min.js') }}"> </script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"> </script>  --}}
    
    <!-- Mainly scripts -->
    <script src="{{ asset('js/admin/jquery.metisMenu.js') }}"> </script>
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"> </script>

    <!-- Custom and plugin javascript -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/graph.css') }}" rel="stylesheet">
    <link href="{{ asset('css/clndr.css') }}" rel="stylesheet">
</head>
<body background="{{ asset('storage/masjid-landing-page.jpg') }}">
    @yield('content')
</body>
</html>
