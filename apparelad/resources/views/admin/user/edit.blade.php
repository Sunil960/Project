@extends('admin.layouts.dashboard')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit User </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">User</a>
							<span class="breadcrumb-item active">Edit</span>
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
								<h5 class="card-title">Edit User</h5>
							</div>
							<div class="card-body">
								<form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
								 @csrf
                                 @method('PATCH')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">First Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
											@if ($errors->has('first_name'))
												<p class="alert-danger">{{ $errors->first('first_name') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Last Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
											@if ($errors->has('last_name'))
												<p class="alert-danger"> {{ $errors->first('last_name') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Email:</label>
										<div class="col-lg-9">
											<input type="email" class="form-control" name="email" value="{{$user->email}}">
											@if ($errors->has('email'))
												<p class="alert-danger">{{ $errors->first('email') }}</p>
											@endif
										</div>
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-success">Update<i class="icon-paperplane ml-2"></i></button>
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