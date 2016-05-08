@extends( 'layouts.default' )

@section( 'title' )
	{{ $user->first_name }}'s Profile
@stop

@section( 'body' )
		<div class="row">
			<section class="twelve columns">

				@if( count( $errors ) > 0 ) 
					<ul>
			            @foreach ($errors->all() as $message)
			                <li>{{ $message }}</li>
			            @endforeach
			        </ul>
			    @endif
				{!! Form::open(array('route' => array('user/update'), 'method' => 'post', 'enctype' => 'multipart/form-data' )) !!}
						<div class="row">
							<fieldset class="four columns profilePicture">
								<figure>
									{!! HTML::image( ( $user->profile_picture != '') ? $user->profile_picture : '/img/default.jpg') !!}

									<figcaption>
										<span class="button btn-file">
										    Upload New Profile Picture {!! Form::file('profile_picture', ['onChange'=>'this.form.submit();']) !!}
										</span>
									</figcaption>
								</figure>
							</fieldset>
							<fieldset class="seven columns offset-by-one">
								{!! Form::label('first_name','First Name') !!}
	            				{!! Form::text('first_name', $user->first_name, array('class' => 'twelve columns', 'placeholder'=>'Bobby')) !!}
								
								{!! Form::label('last_name','Last Name') !!}
	            				{!! Form::text('last_name', $user->last_name, array('class' => 'twelve columns', 'placeholder'=>'Drop-Tables')) !!}

	            				{!! Form::label('tagline','Tagline') !!}
	            				{!! Form::text('tagline', $user->tagline, array(
	            								'class' => 'twelve columns', 
	            								'placeholder' => 'CTO of Founders Market', 
	            								'maxlength' => '60')) !!}
								
								{!! Form::label('college','College')              	        !!}
                    			{!! Form::select('college', $user->colleges, 'University College Cork')  !!}
							</fieldset>
						</div>
						<div class="row">
			                <div class="four columns"> 
			                    {!! Form::label('country','Country')                     !!}
			                    {!! Form::select('country', $user->countries , ($user->country != '') ? $user->country : 'Ireland')  !!}
			                </div>

			                <div class="four columns">
			                    {!! Form::label('main_skill','Main Skill')            !!}
			                    {!! Form::select('main_skill', $user->main_skills, $user->main_skill )  !!}
			                </div>

			                <div class="four columns">
				                {!! Form::label('intention','Intention')         !!}
				                {!! Form::select('intention', $user->intents, $user->intention )  !!}
				            </div>
			            </div>

						<fieldset class="row">
							<legend>Skills</legend>
							<label><em>(Separated by commas)</em></label>
							{!! Form::textarea( 'skills', $user->skills, ['class'=>'twelve columns', 'placeholder'=>'Computer Science, Business Development, Cyber Security, Web Development'] ) !!}
						</fieldset>
						
						<fieldset class="row">
							<legend>Past Experiences</legend>


								{!! Form::textarea( 'past_experience', $user->past_experience, ['class' => 'twelve columns height-250', 'cols'=>'', 'rows'=>'']) !!}
						</fieldset>

						<fieldset class="row">
							<legend>Who are you looking for?</legend>


								{!! Form::textarea( 'looking_for', $user->looking_for, ['class' => 'twelve columns height-250', 'cols'=>'', 'rows'=>'']) !!}
						</fieldset>
						
						<br />
						<br />
						<em>Have you filled everything out? You can double check your information or come back here later :)</em>
						<div class="row">
							{!! Form::submit('Update', array('class' => 'button button-primary u-pull-right')) 		!!}
							{!! Form::close( ) !!}
						</div>
			</section>
		</div>
@stop