@extends('admin.layouts.dashboard')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Product </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
                
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Product</a>
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
								<h5 class="card-title">Add Product</h5>
							</div>
							<div class="card-body">
								<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
								@csrf
                                @method('POST')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Product Name:</label>
										<div class="col-lg-9">
										    <input type="text" class="form-control" name="product_name" placeholder="Name" value="{{ old('product_name') }}">
											@if ($errors->has('product_name'))
												<p class="alert-danger">{{ $errors->first('product_name') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Category:</label>
										<div class="col-lg-9">
									      <select class="form-control" name="category_id">
											<option value="0">None</option>
											@foreach( $categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
										  </select>
										</div>
									</div>
									<!--<div class="form-group row">
										<label class="col-lg-3 col-form-label">Quantity:</label>
										<div class="col-lg-9">
											<input type="number" class="form-control" name="quantity" placeholder="Quantity" min="1" value="{{ old('quantity') }}">
											@if ($errors->has('quantity'))
												<p class="alert-danger">{{ $errors->first('quantity') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Price:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
											@if ($errors->has('price'))
												<p class="alert-danger"> {{ $errors->first('price') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">SKU:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="sku" placeholder="SKU" value="{{ old('sku') }}">
											@if ($errors->has('sku'))
												<p class="alert-danger">{{ $errors->first('sku') }}</p>
											@endif 
										</div>
									</div>-->
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Front Image:</label>
										<div class="col-lg-9">
											<input type="file" name="front_cover_image" class="form-input-styled" data-fouc value="{{ old('front_cover_image') }}">
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('front_cover_image'))
												<p class="alert-danger">{{ $errors->first('front_cover_image') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Back Image:</label>
										<div class="col-lg-9">
											<input type="file" name="back_cover_image" class="form-input-styled" data-fouc value="{{ old('back_cover_image') }}">
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('back_cover_image'))
												<p class="alert-danger"> {{ $errors->first('back_cover_image') }}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Shadow Image:</label>
										<div class="col-lg-9">
											<input type="file" name="shadow_cover_image" class="form-input-styled" data-fouc value="{{ old('shadow_cover_image') }}">
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('shadow_cover_image'))
												<p class="alert-danger">{{ $errors->first('shadow_cover_image') }}</p>
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