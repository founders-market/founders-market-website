@extends( 'layouts.default' )

@section( 'body' )
	<div class="row">
		<section class="twelve columns">
			{!! Form::open( ['route' => ['user/settings'], 'method' => 'post' ]) !!}


			{!! Form::close() !!}
		</section>
	</div>
@stop