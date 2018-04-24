		<a href="" class="footer__left">
			Designed by 
			@if(Auth::check())
				{{ Auth::user()->name }} - {{ Auth::user()->id }}
			@else
				me
			@endif 
		</a>
	    <div class="footer__right">
	    	@if(Auth::check())
				<a href="/logout">Logout</a>
			@else
				<a href="/login">Login</a>
            	<a href="/signup">Register</a>
			@endif 
           
	    </div>