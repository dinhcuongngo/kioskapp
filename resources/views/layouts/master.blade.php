<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KioskApp::@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
</head>
<body>
<!-- START OF HEADER-->
<header>
	<div class="container header clearfix">
		@include('layouts.menu')
	</div>
</header>	
<!-- END OF HEADER -->

<!-- START OF BODY -->
<section class="body">
	<div class="container">
		@yield('content')
	</div>
</section>
<!-- END OF BODY -->

<!-- START OF FOOTER -->
<footer>
	<div class="container clearfix footer">
		@include('layouts.footer')
	</div>
</footer>
<!-- END OF FOOTER -->
</body>	
</html>