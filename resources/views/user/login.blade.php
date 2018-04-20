@extends('layouts.master')

@section('title','Login')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Login</span>
			</div>
			<div class="block__content">
				<form action="/login" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<input type="text" name="email" value="{{ old('email')}}" placeholder="Email">
					</div>
					<div>
						<input type="password" name="password" value="" placeholder="Password">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-user-plus"></i> Login
						</button>
					</div>
					<div>
						@include('common.error')
					</div>
				</form>
			</div>					
		</div>
@endsection