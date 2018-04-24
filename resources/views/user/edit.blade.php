@extends('layouts.master')

@section('title', 'Users')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Update User's Profile</span>
			</div>
			<div class="block__content">
				@foreach($data as $user)
				<form action="/users/{{ $user->id }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					
					<div>
						<label>User Profile</label>
					</div>
					<div>
						<input type="text" name="name" value="{{ $user->name }}" placeholder="Name">
					</div>
					<div>
						<input type="text" name="email" value="{{ $user->email }}" placeholder="Email">
					</div>
					<div>
						<button type="submit" name="btnAdd">
							<i class="fas fa-edit"></i> Update user
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
						<?php //dd(Session::get('fails')); ?>
						{{-- @if($errors->get('fails'))
							{{ $errors->get('fails')[0] }}
						@endif --}}

						@if($errors->all())
							{{ $errors->first() }}
						@endif
						</p>
					</div>
					
				</form>
				@endforeach
			</div>						
		</div>

@endsection