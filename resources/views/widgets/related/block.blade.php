<li itemprop="itemListElement" itemscope itemtype="http://schema.org/MusicRecording">
    <a href="{{ url($type.'/'.$related->slug) }}" title="{{ $related->artist . ' - ' . $related->name }}" class="clearfix">
        @if( $related->created_at->diffInHours( \Carbon\Carbon::now() ) <= 4 )
            <span class="label new">New</span>
        @endif
        <span class="title"><strong class="artist" itemprop="byArtist">{{ $related->artist }}</strong> - <span class="name" itemprop="name">{{ $related->name }}</span></span>
        <span class="information">
            <span class="genre" itemprop="genre">{{ $related->genre->name }}</span>,
            <time class="published" datetime="{{ $related->created_at->toAtomString() }}">{{ $related->created_at->diffForHumans() }}</time>
        </span>
    </a>
    <meta itemprop="url" content="{{ url($type.'/'.$related->slug) }}" />
</li>