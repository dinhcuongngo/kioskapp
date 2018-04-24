@extends('layouts.master')

@section('title', 'Product')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Edit Product</span>
			</div>
			<div class="block__content">
				<form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<div>
						<label style="float:left;">Product Information</label>
						<a href="/product/{{ $product->id }}/category" class="link-right"><i class="fas fa-plus-circle"></i> Add category</a>
					</div>
					<div>
						<input type="text" name="name" value="{{ $product->name }}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="description" value="{{ $product->description }}" placeholder="Description">
					</div>
					<div>
						<input type="file" name="photo">
					</div>
					<div>
						<img src="{{ asset($product->photo) }}" alt="product's photo">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-edit"></i> Update
						</button>
					</div>
					@if(Session::has('success'))
					<div>
						<p class="msg-success">							
							{{ Session::get('success') }}
					        @php
					        Session::forget('success');
					        @endphp
						</p>
					</div>
					@endif
					<div>
						@include('common.error')
					</div>
				</form>
			</div>					
		</div>
		<div class="block">
			<div class="block__title">
				<span>Current Product's Categories</span>
			</div>
			<div class="block__content">
				@if(count($categories) > 0)
					@foreach($categories as $category)
						<div class="block__content_list clearfix">
							<div class="block__content_list_left">
								<span>{{ $category->name }}</span>
							</div>
							<div class="block__content_list_right">
								<ul>
									<li>
										<form action="/product/{{ $product->id }}/category/{{ $category->id }}" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" class="btn btnDel"><i class="far fa-times-circle"></i></button>
										</form>
									</li>
								</ul>					
							</div>
						</div>
					@endforeach
				@else
					<p>List of products is empty!</p>
				@endif
			</div>
		</div>
@endsection