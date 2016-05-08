@extends('layouts.default')

@section('title')
	Founder's Market: {{ $user->first_name .' '. $user->last_name }}
@stop

@section( 'body' )
	<div class="row" id="user-profile">
		<article class="twelve columns">
			<div class="row">
				<section class="four columns profilePicture">
					<figure>
						{!! HTML::image( ( $user->profile_picture != '') ? $user->profile_picture : '/img/default.jpg', $user->first_name.' '.$user->last_name) !!}
					</figure>
				</section>

				<section class="seven columns">
					
					<h1>{{ $user->first_name.' '.$user->last_name }}
						@if( Auth::check() && Auth::user()->username == $user->username )
							<a href="{{ URL::route('edit_profile', [ 'username' => (Auth::user()->username) ]) }}">
								<button type="button" class="button button-primary">Edit Profile</button>
							</a>
						@else
							<a href="{{ URL::route( 'messages/user_id', [ 'user_id' => $user->id ] ) }}" class="five-margin-left">
								<i class="fa fa-envelope-o"></i> 
							</a>
						@endif
					</h1>
					<h3>{{ $user->tagline }}</h3>
					<h4 class="no-margin">{{ $user->main_skill }}</h4>
					<h5 class="fifteen-below"> {{ $user->intention }}</h5>
					
					<p> 
						@if( $user->college != '' )
							<a class="college button" href="{{ URL::route( 'search', [$user->college,'null','null', 'null', 'null'] ) }}">
								{{ $user->college }}
							</a>
						@endif

						@if( $user->country != '' )
							<a class="country button" href="{{ URL::route( 'search', ['null','null',$user->country, 'null', 'null'] ) }}">
								{{ $user->country }}
							</a>
						@endif
					</p>
					
					<?php 
					/*
						if( isset($profileInfo->twitter) && $profileInfo->twitter != '' ){ ?>
						<a data-bind="attr:{href:content.twitter}" class="five-margin-left">
							<i class="fa fa-twitter-square fa-3x"></i> 
						</a>
					<?php } ?>

					<?php 
						if( isset($profileInfo->linkedin) && $profileInfo->linkedin != '' ){ ?>
						<a data-bind="attr:{href:content.linkedin}" class="five-margin-left">
							<i class="fa fa-linkedin-square fa-3x"></i> 
						</a>
					<?php } ?>

					<?php 
						if( isset($profileInfo->website) && $profileInfo->website != '' ){ ?>
						<a data-bind="attr:{href:content.website}" class="five-margin-left">
							<i class="fa fa-globe fa-3x"></i> 
						</a>
					<?php } ?>
					*/ ?>
				</section>
			</div>
			<section class="row" id="skills">
				@if( isset( $user->skills ) )
					@foreach($user->skills as $skill)
							<a href="{{ URL::route( 'search', ['null', $skill, 'null', 'null', 'null'] ) }}" class="button skill" >{{ trim( $skill ) }}</a>
		 			@endforeach
		 		@endif
 			</section>
	
			@if( isset( $user->past_experience ) && $user->past_experience != '' )
				<section>
					<h2> Past Experiences: </h2>
					<p class="include-breaks">{{ $user->past_experience }}</p>
				</section>
			@endif
			
			@if( isset( $user->looking_for ) && $user->looking_for != '' )
				<section>
					<h2> Who I'm looking for: </h2>
					<p class="include-breaks">{{ $user->looking_for }}</p>
				</section>
			@endif
			<?php
			/*
			<section class="row" id="contacts">
				<!-- ko if: content.showEmail == 'on' -->
					<a href="mailto: <?php echo $profileInfo->email; ?>" class="five-margin-left">
						<i class="fa fa-envelope-o fa-3x"></i> 
					</a>
				<!-- /ko -->
				
				<?php 
					if( isset($profileInfo->twitter) && $profileInfo->twitter != '' ){ ?>
					<a data-bind="attr:{href:content.twitter}" class="five-margin-left">
						<i class="fa fa-twitter-square fa-3x"></i> 
					</a>
				<?php } ?>

				<?php 
					if( isset($profileInfo->linkedin) && $profileInfo->linkedin != '' ){ ?>
					<a data-bind="attr:{href:content.linkedin}" class="five-margin-left">
						<i class="fa fa-linkedin-square fa-3x"></i> 
					</a>
				<?php } ?>

				<?php 
					if( isset($profileInfo->website) && $profileInfo->website != '' ){ ?>
					<a data-bind="attr:{href:content.website}" class="five-margin-left">
						<i class="fa fa-globe fa-3x"></i> 
					</a>
				<?php } ?>
			</section>
			*/ ?>
		</article>
	</div>
@stop