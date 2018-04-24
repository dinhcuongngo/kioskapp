		<div class="block">
			<div class="block__title">
				<span>Current Products</span>
			</div>
			<div class="block__content">
				@if(count($products) > 0)
					@foreach($products as $product)
						<div class="block__content_list clearfix">
							<div class="block__content_list_left">
								<img src="{{ asset($product->photo) }}" class="photo-thumb">
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