@extends( 'layouts.default' )

@section('body')
	<div class="row">
		<section class="six columns">
	        {!! HTML::image( '/img/signup.jpg', "Founders Market", ['id'=>"signup-image"]) !!}
	    </section>
			
		<section class="four columns">
			@foreach ($errors->all() as $message)
				{{$message}}
			@endforeach
			{!! Form::open( array('url' => 'login', 'method' => 'post') ) 		!!}

			{!! Form::label('email','Email')									!!}
			{!! Form::text('email', null,array('class' => 'twelve columns'))	!!}

			{!! Form::label('password','Password')								!!}
			{!! Form::password('password',array('class' => 'twelve columns'))	!!}

			{!! Form::submit('Login') 											!!}

			{!! Form::close() 													!!}

			<p>
				<a href="{{ URL::to('/password/email') }}"> Forgot password?</a>
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="{{ URL::route('register') }}"> Want to register?</a>
			</p>
		</section>
	</div>
@stop