@extends('layouts.default')


@section('title')
Add News Item
@stop

@section('body')
	<section class="eight columns offset-by-two">
		<ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

	    {!! Form::open( array('route' => array('news/store'), 'method' => 'post', 'enctype' => 'multipart/form-data') ) !!}
			<section class="row">
				{!! Form::label('image','Image') !!}
				{!! Form::file('image') !!}
			</section>
			<section class="row">
				<div class="six columns">
					{!! Form::label('title','News Title') !!}
					{!! Form::text('title', '', array('class' => 'twelve columns', 'placeholder'=>'Putin Found Down Back Of Couch')) !!}
				</div>
				<div class="six columns">
					{!! Form::label('author','Author:') !!}
					{!! Form::text('author', '', array('class' => 'twelve columns', 'placeholder'=>'Philip Mngadi')) !!}
				</div>
			</section>
			<section class="row">
				{!! Form::label('url','URL') !!}
				{!! Form::url('url', '', array('class' => 'twelve columns', 'placeholder'=>'http://foundersmarketapp.com')) !!}
			</section>
			<section class="row">
				{!! Form::label('sponsored','Sponsored?',['class' => 'two columns'])                     !!}
			    {!! Form::select('sponsored', ['yes' => 'yes', 'no' => 'no'], 'no', ['class' => 'two columns']);  !!}
			</section>
			<section class="row">
				{!! Form::label('excerpt','Excerpt') !!}
				{!! Form::textarea( 'excerpt', null, ['class' => 'twelve columns height-250', 'cols'=>'', 'rows'=>'']) !!}

				{!! Form::submit('Create', array('class' => 'button button-primary u-pull-right')) !!}
			</section>

		{!! Form::close( ) !!}
	</section>
@stop