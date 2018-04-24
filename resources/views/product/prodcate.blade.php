@extends('layouts.master')

@section('title', 'Product')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Edit Product</span>
			</div>
			<div class="block__content">
				<form action="/product/{{ $product->id }}/category" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<label>Product Information</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ $product->name }}" placeholder="Name" readonly="readonly">
					</div>
					@foreach($categories as $category)
						<div>
							<input type="checkbox" name="categories[]" value="{{ $category->id}}">
							<span>{{ $category->name }}</span>
						</div>
					@endforeach
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-edit"></i> Add categories
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

@endsection