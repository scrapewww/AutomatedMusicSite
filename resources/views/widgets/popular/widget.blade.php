<?php
	$type = isset( $type ) ? $type : '';
/*
$items = \Illuminate\Support\Facades\Cache::remember('1popular_'.$type, 60, function() use ($type) {
    switch( $type ) {
        case "tracks":
            return App\Track::all()->sortBy('page_visits_7d')->take(5);
            break;
    }
});
*/
?>
<!--
<section class="popular">
	<header>
		<h2>Most popular {{ $type }}</h2>
	</header>
	<ol class="popular">

	</ol>
</section>
-->