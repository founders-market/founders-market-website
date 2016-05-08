@extends( 'layouts.default' )

@section('title')
	Founders Market - FAQ
@stop

@section('body')
	<section class="eight columns offset-by-two">
		<figure>
			<img src="/img/about_page.png" />
		</figure>
		<section>
			<h4>What is Founders Market about?</h4>

			<p>Founders Market is here to connect student entrepreneurs to other student entrepreneurs who can come together with complementary skills and turn dorm room ideas into striving businesses together.</p>

			<p>Don’t go to your grave with your ideas, sign up today!</p>
		</section>

		<section>
			<h4>How does it work?</h4>

			<p>It is as simple as ABC. Maybe even more simple.</p>
			<ol>
				<li>Register.</li>
				<li>If you have an idea, post it (protect your idea when you publish it).</li>
				<li>If you do not have an idea but can contribute to a business, search for founders around you with ideas and join their teams. </li>
				<li>Connect with other student entrepreneurs.</li>
				<li>Send messages.</li>
				<li>Done! You should have a team and be ready to work away on your new business venture!</li>
			</ol>

			<p>It is that easy! We are here to help you, so do not hesitate to get in touch with us if you need anything related to our Founders Market service.</p>
		</section>
		
		<section>
			<h4>How much does it cost?</h4>
			<p>-	Founders Market is as free as a bird.</p>
		</section>

		<section>
			<h4>Am I talented enough to be on Founders Market?</h4>

			<p>Are you alive? Are you passionate? Do you want to seize the day and make the most of your life? Do you want to wake up in the morning with a purpose? Do you want to leave your mark in the world? Well then, do you still want to know what we think?</p>

			<p>You are more than talented! So go on, grab this opportunity – sign up today!</p>
		</section>
		
		<section>
			<h4>Does Founders Market work for real?</h4>
			<p>Let’s talk numbers. We have matched more than 30 student entrepreneurs who have gone on to start start-ups in university. You want to know if Founders Market works? Try it and then get back to us! <a href="mailbox@foundersmarketapp.com"> mailbox@foundersmarketapp.com</a>.</p> 
		</section>

		<section>
			<h4>Can I find people on Founders Market who are willing to invest money in my start-up?</h4>

			<p>At the moment, the closest thing to investors on Founders Market are the mentors/advisors using the platform, as well as the student entrepreneurs who may have cash to put up to join a company. So the answer is yes, you may find people on Founders Market who are willing to invest money into your start-up; we just don’t know who they are. It is very possible so good luck.</p>
		</section>

		{{-- <section>
		<h4>How does messaging work?</h4>

		Founders Market users have unlimited messages. They can message as many candidates as they please as often as they would like. --}}

		{{-- <section>
		<h4>How can I get my profile to the top of the list in search results?</h4>

		<p>The search results are ordered by members who have most recently logged into their account. Those members who have most recently logged in are listed at the top of the search results. Staying active by logging in frequently is a great way to get your profile to the top of the search results.</p>
			</section>
		 --}}


		<a href="{{ URL::route('register') }}" class="button eight columns offset-by-two">Sign up for free</a>
	</section>
@stop