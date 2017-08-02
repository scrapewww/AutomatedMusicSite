<section class="latest-albums clearfix" itemscope itemtype="http://schema.org/ItemList">
    <header class="section-header">
        <h2 itemprop="name"><a href="{{ url('mixtapes') }}">Latest Mixtapes</a></h2>
        <span class="actions">
			<a class="view-all" href="{{ url('mixtapes') }}">All</a>
		</span>
    </header>
    <ul class="albums-list clearfix">
        @foreach( $mixtapes AS $mixtape )
            @include('mixtapes.block')
        @endforeach
    </ul>
</section>