@extends('admin.layouts.dashboard')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Paypal Credentials </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Paypal Credentials</a>
							<span class="breadcrumb-item active">Add</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Horizontal form options -->
				<div class="row">
					<div class="col-md-12">

						<!-- Basic layout-->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h5 class="card-title">Add Paypal Credentials</h5>
							</div>
							<div class="card-body">
								<form action="{{route('paypal.store')}}" method="post" enctype="multipart/form-data">
								@csrf
                                @method('POST')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Api Username:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="api_username" placeholder="Api Username" value="{{ old('api_username') }}">
											@if ($errors->has('api_username'))
												<p class="alert-danger">{{ $errors->first('api_username') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Api Passwprd:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="api_password" placeholder="Api Password" value="{{ old('api_password') }}">
											@if ($errors->has('api_password'))
												<p class="alert-danger">{{ $errors->first('api_password') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Api Signature:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="api_signature" placeholder="Api Signature" value="{{ old('api_signature') }}">
											@if ($errors->has('api_signature'))
												<p class="alert-danger">{{ $errors->first('api_signature') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Account Type:</label>
										<div class="col-lg-9">
											<select class="form-control" name="account_type">
											<option value="live">Live</option>
											<option value="sandbox">Sandbox</option>
											</select>
										</div>
									</div>
									
									<div class="text-right">
										<button type="submit" class="btn btn-primary">Add<i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
						</div>
						<!-- /basic layout -->

					</div>
				</div>
			</div>
			<!-- /content area -->
@endsection 