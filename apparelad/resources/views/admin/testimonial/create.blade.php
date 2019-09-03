@extends('admin.layouts.dashboard')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Testimonial </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
                
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Testimonial</a>
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
								<h5 class="card-title">Add Testimonial</h5>
							</div>
							<div class="card-body">
								<form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
								@csrf
                                @method('POST')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Title:</label>
										<div class="col-lg-9">
										    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
											@if ($errors->has('title'))
												<p class="alert-danger">{{ $errors->first('title') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Position:</label>
										<div class="col-lg-9">
										    <input type="text" class="form-control" name="position" placeholder="Position" value="{{ old('position') }}">
											@if ($errors->has('position'))
												<p class="alert-danger">{{ $errors->first('position') }}</p>
											@endif 
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Image:</label>
										<div class="col-lg-9">
											<input type="file" name="testimonial_image" class="form-input-styled" data-fouc>
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('testimonial_image'))
												<p class="alert-danger">{{ $errors->first('testimonial_image') }}</p>
											@endif
										</div>
									</div>
									
									<div class="form-group row">
									<label class="col-lg-3 col-form-label">Description</label>
										<!-- CKEditor default -->
									<div class="mb-3">
										<textarea name="description" id="editor-full" rows="4" cols="4">
										</textarea>{{ old('description') }}
										@if ($errors->has('description'))
												<p class="alert-danger">{{ $errors->first('description') }}</p>
										@endif
									</div>
				                       <!-- /CKEditor default -->
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