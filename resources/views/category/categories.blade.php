@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>New Category</span>
			</div>
			<div class="block__content">
				<form action="/categories" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<label>Category</label>
					</div>
					<div>
						<input type="text" name="name" value="" placeholder="Name">
					</div>
					<div>
						<input type="text" name="description" value="" placeholder="Description">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-plus"></i> Add new category
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
				<span>Current Categories</span>
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
									<li><a href="/categories/{{ $category->id }}" class="btn btnUpdate"><i class="far fa-edit"></i></a></li>
									<li>
										<form action="/categories/{{ $category->id }}" method="POST">
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
					<p>List of categories are empty!</p>
				@endif
			</div>
		</div>

@endsection