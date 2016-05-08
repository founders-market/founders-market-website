@extends('layouts.default')

@section('title')
	Founders Market - About 
@stop

@section('body')
	<section class="eight columns offset-by-two">
		<figure>
			<img src="/img/about_page.png" />
		</figure>

{{-- 			<h4> Meet lots of people, drink lots of coffee</h4>

			<p><strong>Founders Market</strong> is a directory for finding people with the <strong>skills you need to build out your team</strong>. It's a great way to find students in your college or another who would be interested in building, creating or talking about something you need. It's also a great way to put yourself forward for new experiences and meet new people in the process.</p>


			<h4> Build the world you want to live in</h4>
			<p>It's always been my <em>dream</em> to change something about the way people around me live or interact. I'm really hoping Founders Market helps someone or some people achieve that dream and change the world around them</p>
 --}}


			<h4>CONNECTING GREAT MINDS.</h4>

			<p>Founders Market is an entrepreneurship social networking site that provides a platform for student entrepreneurs to find other student entrepreneurs (on the same campus, or in the same city/country) to turn ideas into reality.</p>

			<p>Our mission is simple: To encourage and promote student entrepreneurship. To turn more dorm room ideas into successful businesses.</p>

			<p>For students, by students.</p>

			<p>“<strong>Founders Market</strong> is a directory for finding people with the <strong>skills you need to build out your team</strong>. It's a great way to find students in your college or another who would be interested in building, creating or talking about something you need. It's also a great way to put yourself forward for new experiences and meet new people in the process. It's always been my dream to change something about the way people around me live or interact. I'm really hoping Founders Market helps student either become bold in entrepreneurship or achieve that dream of building a company that can change the world around them”  - <em>Evan Smith, Co-Founder and CTO</em></p>

			<p><strong>Sign-up for free.</strong> Connect with other great minds. Build something from scratch. Live a life worth living. Do something that matters. Leave your mark on this world.</p>


		<a href="{{ URL::route('register') }}" class="button eight columns offset-by-two">I'll have what he's having</a>
	</section>
@stop