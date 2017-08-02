<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/MusicRecording">
	<a href="{{ url('tracks/'.$track->slug) }}" title="{{ htmlspecialchars($track->artist.' - '.$track->name) }}" class="clearfix">
		@if( $track->created_at->diffInHours( \Carbon\Carbon::now() ) <= 4 )
			<span class="label new">New</span>
		@endif
		<!--<span class="label hot">Hot</span>-->
		<span class="title">
			<strong class="artist" itemprop="byArtist">{{ $track->artist }}</strong> - <span class="name" itemprop="name">{{ $track->name }}</span>
		</span>
		<span class="information">
			<span class="genre" itemprop="genre">{{ $track->genre->name }}</span>,
			<time class="published" datetime="{{ $track->created_at->toAtomString() }}">{{ $track->created_at->diffForHumans() }}</time>
		</span>
	</a>
	<meta itemprop="url" content="{{ url('tracks/'.$track->slug) }}">
</li>