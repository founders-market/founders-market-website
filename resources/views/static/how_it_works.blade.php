@extends('layouts.default')

@section('title')
	Founders Market - How It Works
@stop

@section('body')
	<section class="ten columns offset-by-one">
		<h4> How it works</h4>
		<p>Are you a student entrepreneur with an idea and you are looking for co-founders to help you build this idea? Or are you a student with skills that could help another student entrepreneur build their idea?</p>

		<p>Then you my friend, are in the right place!</p>
		
		<p>Create a free profile on Founders Market. Search and connect with other student entrepreneurs on your campus, in your city and in your country. Find great business advisers in your area to help you as you venture into the entrepreneurial world. Follow cool start-up events and organisations in your area. Win prizes and free tickets to attend these events and grow your network of entrepreneurs.</p>
		
		<p>Do all of this, and more, on our platform. Founders Market is made by student entrepreneurs for student entrepreneurs.</p>

		<br /><br />
		<a href="{{ URL::route('register') }}" class="button eight columns offset-by-two">Sign up today!</a>
	</section>
@stop