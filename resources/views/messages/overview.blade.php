@extends('layouts.default')

@section('title')
Your Messages
@stop

@section('body')
		@if( count( $contacts ) == 0 )
			<section class="eight columns offset-by-two">
				<h4>Start off your messages by clicking on the envelope on someone's profile</h4>
			</section>
		@endif
		@foreach( $contacts as $contact )
				<section id="user-profile" class="messages">
					<figure class="two columns">
						<a href="{{ URL::route( 'messages/user_id', [ 'user_id' => $contact->id ] ) }}">
							<img src="{{ $contact['profile_picture'] }}" />
						</a>
					</figure>
					<section id="info" class="ten columns">
						<h1 
							@if( $contact['unread_count'] > 0 )
								class="unread"
							@endif
						>
							<a href="{{ URL::route( 'messages/user_id', [ 'user_id' => $contact->id ] ) }}">
								{{ $contact['first_name'].' '.$contact['last_name'] }}
							</a>
							@if( $contact['unread_count'] > 0 )
								<small>(Unread)</small>
							@endif
						</h1>
						<h3>{{ $contact['tagline'] }}</h3>
						<h4 class="no-margin">{{ $contact['main_skill'] }}</h4>
						<h5 class="fifteen-below"> {{ $contact['intention'] }}</h5>
					</section>
				</section>
		@endforeach
@stop