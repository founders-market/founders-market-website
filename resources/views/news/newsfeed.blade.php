@extends('layouts.default')

@section('title')
News - Founders Market
@stop

@section('body')
<div id="news">
	<div class="row">
		@foreach( $news_items as $item )
			@if( ($item->iterator % 3) == 0 && $item->iterator != 0)
				</div>
				<div class="row">
			@endif
			
			<figure class="four columns">
				<a href="{{ URL::to( $item->url ) }}">
					<div class="thumb news-thumb">
						{!! HTML::image( ( $item->image != ''  ? $item->image : '/img/default.jpg' ) ) !!}
					</div>
				</a>
				<figcaption class="person-details">
					<a href="{{ URL::to( $item->url ) }}">
						<h3>{{ $item->title }}</h3>
					</a>
					<p class="u-left-align u-normal-weight">{{ $item->excerpt }}</p>
					<p class="u-pull-right">
						- {{ $item->author }}
						@if( $item->sponsored == 'yes' )
							(sponsored)
						@endif
					</p>
					@if( App\User::is_admin( ) )
						<section class="u-cf twelve columns">
							<a href="{{ URL::route('update_news', ['news_id' => $item->id]) }}">
								<button class="button"> Update </button>
							</a>
							<a href="{{ URL::route('news/delete', ['news_id' => $item->id]) }}">
								<button class="button warning"> Delete </button>
							</a>
						</section>
					@endif
					<section class="u-cf twelve columns">
						<a href="https://twitter.com/share?hashtags=FoundersMarket&amp;url={{ $item->url }}" target="_blank" class="two columns twitter offset-by-three"> 
							<i class="fa fa-twitter"></i>
						</a>

						<a href="https://twitter.com/share?hashtags=FoundersMarket&amp;url={{ $item->url }}" target="_blank" class="two columns facebook"> 
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://twitter.com/share?hashtags=FoundersMarket&amp;url={{ $item->url }}" target="_blank" class="two columns google-plus"> 
							<i class="fa fa-google-plus"></i>
						</a>
					</section>
					<span class="u-cf"></span>
				</figcaption>
			</figure>

		@endforeach
	</div>
</div>
@stop