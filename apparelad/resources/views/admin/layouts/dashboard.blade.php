<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> {{ config('app.name') }} | @isset($title) {{ $title }} @endisset</title>	
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
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_actions.js') }}"></script> 
	<script src="{{ asset('global_assets/js/demo_pages/form_layouts.js') }}"></script>
	
	<script src="{{ asset('global_assets/js/demo_pages/editor_ckeditor.js') }}"></script>
	<!-- /theme JS files -->
	<!--data table -->
	<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
	<!--data table --> 
	
	<!--Ck Editor Start-->
	<script src="{{ asset('global_assets/js/plugins/editors/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<!--Ck Editor End-->
</head>
<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="{{url('/start')}}" class="d-inline-block">
				<img src="{{ asset('global_assets/images/logo_light1.png') }}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

			<span class="badge ml-md-3 mr-md-auto"> &nbsp; </span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
			<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
										<span class="d-block text-muted font-size-sm">Lead web developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Will Brason</a>
										<span class="d-block text-muted font-size-sm">Marketing manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
										<span class="d-block text-muted font-size-sm">Project manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
										<span class="d-block text-muted font-size-sm">Business developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
										<span class="d-block text-muted font-size-sm">UX expert</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All users</a>
							<a href="#" class="text-grey"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>

				<li class="nav-item dropdown">
<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
  <div class="dropdown-content-footer justify-content-center p-0">
			  <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
			</div>
					</div>
				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle mr-2" height="34" alt="">
						<span>{{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }}}</span>
					</a>
					<!--<div class="dropdown-menu dropdown-menu-right">
					<!--<a href="start.php" class="dropdown-item"><i class="icon-user-plus"></i> My Account</a>
						<div class="dropdown-divider"></div>
						<a href="{{ URL('/logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>								
					</div>-->
					 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	
<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item {{(Request::segment(2) == 'dashboard') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/dashboard')}}" class="nav-link">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item {{(Request::segment(2) == 'category' || Request::segment(1) == 'show') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/category')}}" class="nav-link"><i class="icon-stack2"></i> <span>Category Management</span></a>
						</li>
						<li class="nav-item {{(Request::segment(2) == 'product') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/product')}}" class="nav-link"><i class="icon-puzzle4"></i> <span>Product Management</span></a>
						</li>   
						<li class="nav-item {{(Request::segment(2) == 'user') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/user')}}" class="nav-link"><i class="icon-people"></i> <span>User Management</span></a>
						</li>
						<li class="nav-item {{(Request::segment(2) == 'testimonial') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/testimonial')}}" class="nav-link"><i class="icon-stack"></i> <span>Testimonial Management</span></a>
						</li>
						<li class="nav-item {{(Request::segment(2) == 'paypal') ? 'nav-item-open' : '' }}">
							<a href="{{url('/admin/paypal')}}" class="nav-link"><i class="icon-stack"></i> <span>Paypal Credentials Management</span></a>
						</li>
						<div style="display:none">
						
						<li class="nav-item">
							<a href="mycontact.php" class="nav-link"><i class="icon-thumbs-up2"></i> <span>Leave A Comment</span></a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-stack"></i> <span>Some Dummy Menu</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="../seed/layout_nav_horizontal.html" class="nav-link">Horizontal navigation</a></li>
								<li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">No sidebar</a></li>
								<li class="nav-item"><a href="../seed/sidebar_main.html" class="nav-link">1 sidebar</a></li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">2 sidebars</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="../seed/sidebar_secondary.html" class="nav-link">Secondary sidebar</a></li>
										<li class="nav-item"><a href="../seed/sidebar_right.html" class="nav-link">Right sidebar</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">3 sidebars</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="../seed/sidebar_right_hidden.html" class="nav-link">Right sidebar hidden</a></li>
										<li class="nav-item"><a href="../seed/sidebar_right_visible.html" class="nav-link">Right sidebar visible</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Content sidebars</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="../seed/sidebar_content_left.html" class="nav-link">Left sidebar</a></li>
										<li class="nav-item"><a href="../seed/sidebar_content_right.html" class="nav-link">Right sidebar</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="../seed/layout_boxed.html" class="nav-link">Boxed layout</a></li>
								<li class="nav-item-divider"></li>
								<li class="nav-item"><a href="../seed/navbar_fixed_main.html" class="nav-link">Fixed main navbar</a></li>
								<li class="nav-item"><a href="../seed/navbar_fixed_secondary.html" class="nav-link">Fixed secondary navbar</a></li>
								<li class="nav-item"><a href="../seed/navbar_fixed_both.html" class="nav-link">Both navbars fixed</a></li>
								<li class="nav-item"><a href="../seed/layout_fixed.html" class="nav-link">Fixed layout</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="changelog.html" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Changelog</span>
								<span class="badge bg-green-400 align-self-center ml-auto">NEW</span>
							</a>
						</li>
						
						<!-- /main -->

						<!-- Forms -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Forms</div> <i class="icon-menu" title="Forms"></i></li>
						<li class="nav-item nav-item-submenu nav-item-expanded">
							<a href="#" class="nav-link"><i class="icon-pencil3"></i> <span>Form components</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Form components">
								<li class="nav-item"><a href="form_inputs.html" class="nav-link">Basic inputs</a></li>
								<li class="nav-item"><a href="form_checkboxes_radios.html" class="nav-link">Checkboxes &amp; radios</a></li>
							</ul>
						</li>
</div>


						<!-- /page kits -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
			
			@yield('content')	

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>
</div>
			<!-- /footer -->
		</div>
		<!-- /content wrapper -->
	</div>
	<!-- /page content -->	


</body>
</html>

</html>
