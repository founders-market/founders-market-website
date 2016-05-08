@extends( 'layouts.default' )

@section('title')
	{{ trim( $friend_info->first_name ) }}'s Messages
@stop

@section( 'body' )

	<section id="user-profile" class="messages">
		<figure class="two columns">
			<img src="{{ $friend_info->profile_picture }}" />
		</figure>
		<section id="info" class="ten columns">
			<h1>{{ $friend_info->first_name.' '.$friend_info->last_name }}</h1>
			<h3>{{ $friend_info->tagline }}</h3>
			<h4 class="no-margin">{{ $friend_info->main_skill }}</h4>
			<h5 class="fifteen-below"> {{ $friend_info->intention }}</h5>
		</section>
	</section>
	<section class="row u-cf twelve columns">
		{!! Form::open( array( 'route' => array( 'messages/send' ), 'method' => 'post' ) ) !!}
		{!! Form::label( 'message', 'Message' ) !!}
		{!! Form::textarea( 'message', null, [ 'class' => 'twelve columns height-100', 'cols'=>'', 'rows'=>'' ] ) !!}

		{!! Form::submit( 'Send', array( 'class' => 'button button-primary u-pull-right' ) ) 		!!}
		{!! Form::hidden( 'receiver', $user_id ) !!}


		{!! Form::close( ) !!}
	</section>

	<section id="messages" class="eight columns offset-by-two row">
		@foreach( $messages as $message )
			@if( $message->sender == Auth::user( )->id )
				<div class="row message">
					<div class="ten columns offset-by-one message-bubble sender">
						{{ $message->message }}
					</div>
					<figure class="one column">
						<img src="{{ $sender_info->profile_picture }}" />
						{{ $sender_info->first_name }}
					</figure>
				</div>
			@else
				<div class="row message">
					<figure class="one column">
						<img src="{{ $friend_info->profile_picture }}" />
						{{ $friend_info->first_name }}
					</figure>
					<div class="ten columns message-bubble receiver">
						{{ $message->message }}
					</div>
				</div>
			@endif
		@endforeach
	</section>
@stop