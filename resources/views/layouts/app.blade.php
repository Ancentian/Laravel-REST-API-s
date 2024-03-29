<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Ancent Ecommerce</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/datatables/datatables.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> 
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')

        @yield('content')
    </div>
    @include('layouts.footer')
    
    @include('layouts.scripts')
</body>
</html>

   
    