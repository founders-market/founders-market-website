@extends('layouts.default')

@section('title')
	Founder's Market
@stop

@section('body')

	
	<section class="row fifteen-below">
			{!! Form::open( ['route'=>'search/post', 'method' => 'post'] ) !!}
			{!! Form::select('college', 
								$users->colleges, 
								$users->current_college, 
								['class'=>'three columns search-input', 'onchange'=>'this.form.submit();']) !!}
			{!! Form::select('skill', 
								$users->skills, 
								$users->current_skill, 
								['class'=>'three columns search-input', 'onchange'=>'this.form.submit();']) !!}
			{!! Form::select('intention', 
								$users->intents, 
								$users->current_intent, 
								['class'=>'three columns search-input', 'onchange'=>'this.form.submit();']) !!}
			{!! Form::select('main_skill', 
								$users->main_skills, 
								$users->current_main_skill, 
								['class'=>'three columns search-input', 'onchange'=>'this.form.submit();']) !!}
			{!! Form::hidden( 'country', 'null' ) !!}

			{{-- Form::select('country', 
								$users->countries, 
								$users->current_country, 
								['class'=>'three columns search-input', 'onchange'=>'this.form.submit();']) --}}
			{!! Form::close() !!}
	</section>
	<div class="row">

		@foreach( $users as $user )
			@if( ($user->iterator % 4) == 0 && $user->iterator != 0)
				</div>
				<div class="row">
			@endif
			
			<figure class="three columns">
				<a href="{{ URL::route( 'profile/username', ['username' => $user->username ] ) }}">
					<div class="thumb">
						{!! HTML::image( ( $user->profile_picture != ''  ? $user->profile_picture : '/img/default.jpg' ) ) !!}
					</div>
					<figcaption class="person-details">
						<h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
						<p>{{ $user->tagline or '&nbsp;' }}</p>
						<p>{{ $user->main_skill or '&nbsp;' }} | {{ $user->country or '&nbsp;' }}</p>
					</figcaption>
				</a>
			</figure>

		@endforeach
	</div>

@stop