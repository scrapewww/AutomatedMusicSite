<section class="latest-albums clearfix" itemscope itemtype="http://schema.org/ItemList">
    <header class="section-header">
        <h2 itemprop="name"><a href="{{ url('albums') }}">Latest Albums</a></h2>
        <span class="actions">
			<a class="view-all" href="{{ url('albums') }}">All</a>
		</span>
    </header>
    <ul class="albums-list clearfix">
        @foreach( $albums AS $album )
            @include('albums.block')
        @endforeach
    </ul>
</section>