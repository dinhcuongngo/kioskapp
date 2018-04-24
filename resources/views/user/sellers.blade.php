@extends('layouts.master')

@section('title', 'Users')

@section('content')
		<div class="block">
			<div class="block__title">
				<span>Current Sellers</span>
			</div>
			<div class="block__content">
				@if(count($sellers) > 0)
					@foreach($sellers as $seller)
						<div class="block__content_list clearfix">
							<div class="block__content_list_left">
								<span>{{ $seller->name }}</span>
							</div>
							<div class="block__content_list_right">
								<ul>
									<li><a href="/seller/{{ $seller->id }}/product" class="btn btnView"><i class="fas fa-list"></i> {{ $seller->products->count() }}</a></li>
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