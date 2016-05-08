<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<link rel="icon" href="{{ URL::to('/') }}/img/nn_icon.png" />

	<meta property="og:locale" content="en_GB" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Founder's Market - Connecting Great Minds" />
	<meta property="og:description" content="Find other student entrepreneurs on your campus with amazing skills and ideas; turn dorm room ideas into successful businesses" />
	<meta property="og:site_name" content="Founder's Market" />
	<meta property="og:url" content="{{ URL::to('/') }}" />
	<meta property="og:image" content="{{ URL::to('/') }}/img/facebook_graph.png" />

	{!! HTML::script('//code.jquery.com/jquery-2.1.1.min.js') 	!!}
	{!! HTML::script('/js/bootstrap.min.js') 	!!}
	{!! HTML::script('/js/main.js') 	!!}
	@yield('extra-js')

	{!! HTML::style('/css/normalize.css') !!}
	{!! HTML::style('/css/font-awesome.min.css') !!}
	{!! HTML::style('/css/bootstrap.min.css') !!}
	{!! HTML::style('/css/skeleton.css') !!}
	{!! HTML::style('/css/style.css') !!}
	@yield('extra-css')

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-59567381-1', 'auto');
	  ga('send', 'pageview');

	</script>

</head>
<body>

<header class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </button>
			<a class="navbar-brand" href="/">
				{!! HTML::image( '/img/logo_250.png', "Founders Market", ['class'=>'navIcon']) !!}
				<span class="sr-only">{{ URL::to( '/' ) }}</span>
			</a>
		</div>
		<div class="collapse navbar-collapse nav-collapse">
		
			@if ( Auth::check( ) )
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{url('enter-idea-competition')}}" class="button"
                           style="color:white;background:red;font-size: 12px;padding:10px 15px;height:auto;margin-top:5px;"
                           title="Enter App Competition">Enter Competition</a>
                    </li>
					<li>
	                	<a href="{{ URL::route('home', [ 'username' => Auth::user()->username ]) }}">
	                		<i title="Profile" class="fa fa-newspaper-o">
	                			<span> News</span>
	                		</i>
	                	</a>
	                </li>
	                <li>
	                	<a href="{{ URL::to('users') }}">
	                		<i title="Groups" class="fa fa-users">
	                			<span> People</span>
	                		</i>
	                	</a>
	                </li>
	                <li>
	                	<a href="{{ URL::route('messages') }}">
	                		<i title="Groups" class="fa fa-envelope-o">
	                			<span> 
	                				Messages
	                				@if( $unread_count = App\Message::get_unread_count( Auth::user( )->id ) )
										({{ $unread_count }})
	                				@endif
	                			</span>
	                		</i>
	                	</a>
	                </li>


	                <li class="dropdown">
	                	<a href="{{ URL::route('profile/username', [ 'username' => Auth::user()->username ]) }}">
	                		<i title="Profile" class="fa fa-user">
	                			<span> My Profile <b class="caret"></b></span>
	                		</i>
	                	</a>
	                	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						  	<li role="presentation">
						  		<a role="menuitem" href="{{ URL::route('edit_profile', ['username' => Auth::user()->username ]) }}">
			                		<i title="Edit Profile" class="fa fa-pencil">
			                			<span> Edit Profile</span>
			                		</i>
			                	</a>
						 	<li>
						 	<li role="presentation">
						  		<a role="menuitem" href="{{ URL::route('logout') }}">
			                		<i title="Logout" class="fa fa-sign-out">
			                			<span> Logout</span>
			                		</i>
			                	</a>
						 	<li>
						  	
						</ul>
	                </li>

	                <li class="dropdown">
	                	<a href="{{ URL::to( 'about' ) }}" type="button">
						    <i title="About" class="fa fa-info-circle">
	                			<span> About <b class="caret"></b></span>
	                		</i>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						  	
						 	<li role="presentation">
						  		<a role="menuitem" href="mailto:evan@foundersmarketapp.com">
			                		<i title="Suggest A Feature" class="fa fa-info-circle">
			                			<span> Suggest A Feature </span>
			                		</i>
			                	</a>
						 	<li>
						  	
						</ul>
	                </li>

	                
	            </ul>
			@else
				<div class="navbar-right">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            {!! Form::open(
                            array(
                            'url' => 'login',
                            'method' => 'post',
                            'class'=>'navbar-form',
                            'style'=>'width:500px;'
                            )
                            )
                            !!}

                            {!! Form::text('email', null,array('class' => 'nav-form-element col-xs-12 col-md-3', 'placeholder'=>'Email'))	!!}
                            {!! Form::password('password',array('class' => 'nav-form-element col-xs-12 col-md-3', 'placeholder'=>'Password'))	!!}

                            {!! Form::submit('Login', ['class'=>'button']) !!}
                            <a href="{{ URL::route('register') }}" class="button">Register</a>


                            {!! Form::close() !!}
                        </li>
                        <li>
                            <a href="{{url('enter-idea-competition')}}" class="button" style="color:white;background:red;font-size: 12px;padding:10px 15px;height:auto;margin-top:5px;" title="Enter App Competition">Enter Competition</a>
                        </li>
                        <li><a href="/about"><i title="About" class="fa fa-info-circle"><span> About</span></i></a></li>
                    </ul>
				</div>

				  
			@endif
		</div>
    </div>
</header>

<main class="container">
	@yield( 'body' )

</main>

<footer>
	<ul class="container">
		<li>
			<a href="{{ URL::route('how_it_works') }}">How It Works</a>
		</li>
		<li> 
			<a href="{{ URL::route('privacy_policy') }}">Privacy Policy</a>
		</li>
		<li>
			<a href="{{ URL::route('terms_of_service') }}">Terms Of Service</a>
		</li>
		<li>
			<a href="{{ URL::route('internships') }}">Internships</a>
		</li>
		<li>
			<a href="{{ URL::route('about') }}">About</a>
		</li>
		<li>
			<a href="{{ URL::route('faq') }}">FAQs</a>
		</li>
		<li>
			<a href="{{ URL::route('founding_team') }}">Founding Team</a>
		</li>
		<li>
			Copyright &copy; Founders Market {{ date('Y') }}
		</li>
	<ul>

</footer>


{!! HTML::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js') 	!!}
{!! HTML::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') 	!!}
{!! HTML::script('/js/headroom.min.js') !!}
@yield( 'extra-js-bottom' )

@show

<a href="https://plus.google.com/108429247766063750965" rel="publisher" class="sr-only">Google+</a>
</body>
</html>