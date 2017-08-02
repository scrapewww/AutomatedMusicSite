<section class="latest-videos clearfix" itemscope itemtype="http://schema.org/ItemList">
    <header class="section-header wide">
        <h2 itemprop="name"><a href="{{ url('videos') }}">Latest Videos</a></h2>
        <span class="actions">
			<a class="view-all" href="{{ url('videos') }}">All</a>
		</span>
    </header>
    <ul class="videos-list wide flex flex-wrap clearfix">
        @foreach( $videos AS $video )
            @include('videos.block')
        @endforeach
    </ul>
</section>