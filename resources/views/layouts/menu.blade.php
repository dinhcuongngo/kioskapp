		<a href="" class="header__logo">
			<i class="fab fa-laravel fa-2x"></i>
		</a>
		<nav class="header__menu">
			<ul>
		@if(Auth::check())			
				<li><a href="/">Home</a></li>
				<li><a href="/categories">Category</a></li>
				<li><a href="/products">Product</a></li>
				<li><a href="/transactions">Transaction</a></li>
				<li><a href="/sellers">Seller</a></li>
				<li><a href="/buyers">Buyer</a></li>
				<li><a href="/users">User</a></li>
		@else
				<li><a href="/login">Login</a></li>
            	<li><a href="/signup">Register</a></li>
		@endif
			</ul>
		</nav>
		