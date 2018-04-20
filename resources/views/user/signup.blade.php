@extends('layouts.master')

@section('title','Signup')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Signup</span>
			</div>
			<div class="block__content">
				<form action="/users" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<label>There is no gap between us!</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ old('name')}}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="email" value="{{ old('email')}}" placeholder="Email">
					</div>
					<div>
						<input type="password" name="password" value="" placeholder="Password">
					</div>
					<div>
						<input type="password" name="password_confirmation" value="" placeholder="Confirm password">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-user-plus"></i> Signup
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