@extends('layouts.master')

@section('title', 'Users')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Update User's Profile</span>
			</div>
			<div class="block__content">
				@isset($user)
				<form action="/changePasswd/{{ $user}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					
					<div>
						<label>Change password</label>
					</div>
					<div>
						<input type="password" name="current_password" value="" placeholder="Current Password">
					</div>
					<div>
						<input type="password" name="password" value="" placeholder="New Password">
					</div>
					<div>
						<input type="password" name="password_confirmation" value="" placeholder="Confirmed Password">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-edit"></i> Change password
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
						<p class="msg-errors">	
						@if($errors->all())
							{{ $errors->first() }}
						@endif
						</p>
					</div>
					
				</form>
				@endif
			</div>						
		</div>

@endsection