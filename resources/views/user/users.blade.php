@extends('layouts.master')

@section('title', 'Users')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>New User</span>
			</div>
			<div class="block__content">
				<form action="/users" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<label>User Profile</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
					</div>
					<div>
						<input type="password" name="password" value="" placeholder="Password">
					</div>
					<div>
						<input type="password" name="password_confirmation" value="" placeholder="Confirm Password">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-plus"></i> Add new user
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
				<span>Current Users</span>
			</div>
			<div class="block__content">
				@if(count($users) > 0)
					@foreach($users as $user)
						<div class="block__content_list clearfix">
							<div class="block__content_list_left">
								<span>{{ $user->name }}</span>
							</div>
							<div class="block__content_list_right">
								<ul>
									<li><a href="/users/{{ $user->id }}" class="btn btnUpdate"><i class="far fa-edit"></i></a></li>
									<li>
										<form action="/users/{{ $user->id }}" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="_method" value="DELETE">
											<button type="submit" class="btn btnDel"><i class="fas fa-trash-alt"></i></button>
										</form>
									</li>
									<li><a href="/changePasswd/{{ $user->id }}" class="btn btnUpdate"><i class="fas fa-unlock-alt"></i></a></li>
									<li><a href="/resetPasswd/{{ $user->id }}" class="btn btnReset"><i class="fas fa-sync-alt"></i></a></li>
								</ul>					
							</div>
						</div>
					@endforeach
				@else
					<p>List of users is empty!</p>
				@endif
			</div>
		</div>

@endsection