@extends('layouts.app')

@section('content')
<section class="content clearfix">
	@include('blocks.latest-videos')
	<main>
		@include('blocks.latest-tracks')
		@include('blocks.latest-albums')
		@include('blocks.latest-mixtapes')
	</main>
	<section id="sidebar">
		@include('widgets.popular.widget')
    </section>
</section>
@endsection
