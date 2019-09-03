@extends('admin.layouts.dashboard')

@section('content')
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit Product </span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Product</a>
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
								<h5 class="card-title">Edit Product</h5>
							</div>
							<div class="card-body">
								<form action="{{ route('product.update',$product->pid) }}" method="post" enctype="multipart/form-data">
								 @csrf
                                 @method('PATCH')
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Product Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
											@if ($errors->has('product_name'))
												<p class="alert-danger"> {{ $errors->first('product_name') }}</p>
											@endif
										</div>
									</div>
										<div class="form-group row">
										<label class="col-lg-3 col-form-label">Category:</label>
										<div class="col-lg-9">
											<select class="form-control" name="category_id">
											  <option value="{{$product->id}}">{{$product->name}}</option>
										   </option>
											@foreach( $categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
											@endforeach
											</select>
											</select>
										</div>
									</div>
									<!--<div class="form-group row">
										<label class="col-lg-3 col-form-label">Quantity:</label>
										<div class="col-lg-9">
											<input type="number" class="form-control" name="quantity" min="1" value="{{$product->quantity}}">
											@if ($errors->has('quantity'))
												<p class="alert-danger"> {{ $errors->first('quantity')}}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Price:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="price" value="{{$product->price}}">
											@if ($errors->has('price'))
												<p class="alert-danger"> {{ $errors->first('price')}}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">SKU:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="sku" value="{{$product->sku}}">
											@if ($errors->has('sku'))
												<p class="alert-danger"> {{ $errors->first('sku')}}</p>
											@endif
										</div>
									</div>-->
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Product Status:</label>
										<div class="col-lg-9">
											<input type="checkbox" name="status" 
											@if($product->pstatus == '1')
												checked="checked"
											@endif >
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Front Image:</label>
										<div class="col-lg-9">
										    <img src="{{ URL::to('/') }}/public/images/{{ $product->front_cover_image }}" class="img-thumbnail" width="75" />
											<input type="file" name="front_cover_image" class="form-input-styled" data-fouc><input type="hidden" name="front_hidden_image" value="{{ $product->image }}" />
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('front_cover_image'))
												<p class="alert-danger"> {{ $errors->first('front_cover_image')}}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Back Image:</label>
										<div class="col-lg-9">
										    <img src="{{ URL::to('/') }}/public/images/{{ $product->back_cover_image }}" class="img-thumbnail" width="75" />
											<input type="file" name="back_cover_image" class="form-input-styled" data-fouc><input type="hidden" name="back_hidden_image" value="{{ $product->image }}" />
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('back_cover_image'))
												<p class="alert-danger"> {{ $errors->first('back_cover_image')}}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Shadow Image:</label>
										<div class="col-lg-9">
										    <img src="{{ URL::to('/') }}/public/images/{{ $product->shadow_cover_image }}" class="img-thumbnail" width="75" />
											<input type="file" name="shadow_cover_image" class="form-input-styled" data-fouc><input type="hidden" name="shadow_hidden_image" value="{{ $product->image }}" />
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											@if ($errors->has('shadow_cover_image'))
												<p class="alert-danger"> {{ $errors->first('shadow_cover_image')}}</p>
											@endif
										</div>
									</div>
									<div class="form-group row">
									<label class="col-lg-3 col-form-label">Description</label>
										<!-- CKEditor default -->
									<div class="mb-3">
										<textarea name="description" id="editor-full" rows="4" cols="4">{{$product->description}}
										</textarea>
										@if ($errors->has('description'))
												<p class="alert-danger">{{ $errors->first('description')}}</p>
											@endif
									</div>
				                       <!-- /CKEditor default -->
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