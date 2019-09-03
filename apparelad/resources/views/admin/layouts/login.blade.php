<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Apparelad | Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/login.js') }}"></script>
	<!-- /theme JS files -->

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div  style="margin-left:auto; margin-right:auto;" class="navbar-brand">
			<a href="{{url('/')}}" class="d-inline-block">
				<img src="" alt="">
			</a>
		</div>


</div>
	<!-- /main navbar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">			
			
				@yield('content')
			
		
			

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>

</html>
