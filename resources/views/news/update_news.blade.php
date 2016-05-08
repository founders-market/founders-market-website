@extends('layouts.default')


@section('title')
Update News Item
@stop

@section('body')
	<section class="eight columns offset-by-two" id="update-news">
		<ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
		

	    {!! Form::open( array('route' => array('news/update'), 'method' => 'post', 'enctype' => 'multipart/form-data') ) !!}
			<section class="row">
				<section class="four columns">
					<figure>
						{!! HTML::image( $news_item->image, "Preview Image", ['width' => '200'] ) !!}
					</figure>
				</section>
				<section class="eight columns">
					{!! Form::label('image','Image') !!}
					{!! Form::file('image') !!}
				</section>
			</section>
			<section class="row">
				<div class="six columns">
					{!! Form::label('title','News Title') !!}
					{!! Form::text('title', $news_item->title, array('class' => 'twelve columns', 'placeholder'=>'Putin Found Down Back Of Couch')) !!}
				</div>
				<div class="six columns">
					{!! Form::label('author','Author:') !!}
					{!! Form::text('author', $news_item->author, array('class' => 'twelve columns', 'placeholder'=>'Philip Mngadi')) !!}
				</div>
			</section>
			<section class="row">
				{!! Form::label('url','URL') !!}
				{!! Form::url('url', $news_item->url, array('class' => 'twelve columns', 'placeholder'=>'http://foundersmarketapp.com')) !!}
			</section>
			<section class="row">
				{!! Form::label('sponsored','Sponsored?',['class' => 'two columns'])                     !!}
			    {!! Form::select('sponsored', ['yes' => 'yes', 'no' => 'no'], $news_item->sponsored, ['class' => 'two columns'])  !!}
			</section>
			<section class="row">
				{!! Form::label('excerpt','Excerpt') !!}
				{!! Form::textarea( 'excerpt', $news_item->excerpt, ['class' => 'twelve columns height-250', 'cols'=>'', 'rows'=>'']) !!}

				{!! Form::hidden( 'news_id', $news_item->id ) !!}

				{!! Form::submit('Update', array('class' => 'button button-primary u-pull-right')) !!}
			</section>

		{!! Form::close( ) !!}
	</section>
@stop