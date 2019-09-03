@extends('admin.layouts.dashboard')

@section('content')

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Category </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Category</a>
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
								<h5 class="card-title">Add Category</h5>
							</div>
							<div class="card-body">
								<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
								@csrf
                                @method('POST')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
											@if ($errors->has('name'))
												<p class="alert-danger">{{ $errors->first('name') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Parent Category:</label>
										<div class="col-lg-9">
											<select class="form-control" name="parent_id">
											<option value="0">None</option>
											@foreach( $parent_ids as $parent)
											<option value="{{$parent->id}}">{{$parent->name}}</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Image:</label>
										<div class="col-lg-9">
											<input type="file" name="image" class="form-input-styled" data-fouc>
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('image'))
												<p class="alert-danger">{{ $errors->first('image') }}</p>
											@endif
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