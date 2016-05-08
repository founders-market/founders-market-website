@extends( 'layouts.default' )

@section('title')
Admin Links
@stop

@section('body')

	<ul>
		<li>
			<a href="{{ URL::route('add_news') }}">Add News Item</a>
		</li>
		{{-- <li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a>
		</li>
		<li>
			<a href="{{ URL::route('') }}"></a> --}}
		</li>
	</ul>
@stop