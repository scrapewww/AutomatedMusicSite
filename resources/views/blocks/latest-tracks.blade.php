<section class="latest-tracks clearfix" itemscope itemtype="http://schema.org/ItemList">
    <header class="section-header">
        <h2 itemprop="name"><a href="{{ url('tracks') }}">Latest Tracks</a></h2>
        <span class="actions">
					<a class="view-all" href="{{ url('tracks') }}">All</a>
				</span>
    </header>
    <ul class="tracks-list">
        @foreach( $tracks AS $track )
            @include('tracks.block')
        @endforeach
    </ul>
</section>