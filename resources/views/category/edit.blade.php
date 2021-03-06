@extends('layouts.master')

@section('title', 'Edit Category')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Edit Category</span>
			</div>
			<div class="block__content">
				<form action="/categories/{{ $category->id }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<div>
						<label>Category</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ $category->name }}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="description" value="{{ $category->description }}" placeholder="Description">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-edit"></i> Update category
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