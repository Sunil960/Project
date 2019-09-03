@extends('admin.layouts.dashboard')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Paypal Credentials</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
					<!--<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a class="btn btn-success" href="{{route('paypal.create')}}">Add Paypal Credentials</a>
						</div>
					</div>-->
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Paypal Credentials</a>
							<span class="breadcrumb-item active"></span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->

			<!-- Content area -->
			<div class="content">

				<!-- Basic tables title -->
				<div class="mb-3">
					<h6 class="mb-0 font-weight-semibold">
						Paypal Credentials
					</h6>
				</div>
				<!-- basic tables title -->
				<!-- Hover rows -->
				<div class="card">
					<div class="table-responsive">
						<table class="table datatable-basic" id="paypal_credentials_list">
							<thead>
								<tr>
								    <th>ID</th>
									<th>Api Username</th>
									<th>Api Password</th>
									<th>Api Signature</th>
									<th>Account Type</th>
									<th>Action</th> 
								</tr>
							</thead>
							<tbody>
								 @foreach( $paypalCredentials as $paypalCredential)
								  <tr>
								       <td>#{{$paypalCredential->id}}</td>
									   <td>{{$paypalCredential->api_username}}</td>
									   <td>{{$paypalCredential->api_password}}</td>
									   <td>{{$paypalCredential->api_signature}}</td>
									   <td>@if ($paypalCredential->account_type == "live")
										      Live
									       @else
										      Sandbox
									       @endif
									   </td>
									   <td>
									   <a href="{{ route('paypal.edit',$paypalCredential->id)}}" class="btn btn-primary rounded-round">Edit</a>
									  <!-- <form action="{{ route('paypal.destroy', $paypalCredential->id)}}" method="post">
											  @csrf
											  @method('DELETE')
									   <button class="btn btn-danger rounded-round" type="submit">Delete</button>
									   </form>-->
									   </td>
								  </tr>
								   @endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- /hover rows -->
			</div>
			<!-- /content area -->
@endsection 