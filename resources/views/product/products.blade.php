@extends('layouts.master')

@section('title', 'Product')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>New Product</span>
			</div>
			<div class="block__content">
				<form action="/products" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<label>Product Informaton</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="description" value="{{ old('description') }}" placeholder="Description">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-plus"></i> Add new product
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
				<span>Current Products</span>
			</div>
			<div class="block__content">
				@if(count($products) > 0)
					@foreach($products as $product)
						<div class="block__content_list clearfix">
							<div class="block__content_list_left">
								<span>{{ $product->name }}</span>
							</div>
							<div class="block__content_list_right">
								<ul>
									<li><a href="/products/{{ $product->id }}" class="btn btnUpdate"><i class="far fa-edit"></i></a></li>
									<li>
										<form action="/products/{{ $product->id }}" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" class="btn btnDel"><i class="fas fa-trash-alt"></i></button>
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