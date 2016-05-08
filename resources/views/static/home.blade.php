@extends( 'layouts.default' )

@section('title')
	Founders Market
@stop

@section( 'body' )
	<div class="row">
		<section class="six columns">
	        {!! HTML::image( '/img/signup.jpg', "Founders Market", ['id'=>"signup-image"]) !!}
	    </section>
			
		<section class="six columns">
			<h2 class="homepage-heading"> Connecting Great Minds </h2>
			<p> Find other student entrepreneurs on your campus with amazing skills and ideas; turn dorm room ideas into successful businesses</p>
			<a href="{{ URL::route('register') }}" class="four columns offset-by-four">
				<button class="button button-primary">
					Free! Sign me up
				</button>
			</a>
		</section>
	</div>

@stop