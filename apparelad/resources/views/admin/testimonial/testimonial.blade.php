@extends('admin.layouts.dashboard')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Testimonials</span> - List</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				@if (session('status'))
					<div class="alert alert-success">
						{{ session('status') }}
					</div>
				@endif
					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a class="btn btn-success" href="{{route('testimonial.create')}}">Add Testimonial</a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Testimonial</a>
							<span class="breadcrumb-item active">List</span>
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
						Testimonials List
					</h6>
				</div>
				<!-- basic tables title -->
				<!-- Hover rows -->
				<div class="card">
					<div class="table-responsive">
						<table class="table datatable-basic" id="product_list">
							<thead>
								<tr>
								    <th>ID</th>
									<th>Title</th>
									<th>Position</th>
									<th>Image</th>
									<th>Status</th>
									<th>Action</th> 
								</tr>
							</thead>
							<tbody>
								 @foreach( $testimonials as $testimonial)
								  <tr>
								       <td>#{{$testimonial->id}}</td>
									   <td>{{$testimonial->title}}</td>
									   <td>{{$testimonial->position}}</td>
									   <td><img src="{{ URL::to('/') }}/public/images/{{ $testimonial->testimonial_image }}" class="img-thumbnail" width="75" /></td>
									   <td>@if ($testimonial->status == "1")
										      Active
									       @else
										      De-active
									       @endif
									   </td>
									   <td>
									   <a href="{{ route('testimonial.edit',$testimonial->id)}}" class="btn btn-primary rounded-round">Edit</a>
									   <form action="{{ route('testimonial.destroy', $testimonial->id)}}" method="post">
											  @csrf
											  @method('DELETE')
									   <button class="btn btn-danger rounded-round" type="submit">Delete</button>
									   </form>
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
