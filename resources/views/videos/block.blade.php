<li class="flex" itemprop="itemListElement" itemscope itemtype="http://schema.org/MusicVideoObject">
	<meta itemprop="embedUrl" content="{{ $video->preview }}" />
	<a href="{{ url('videos/'.$video->slug) }}" title="{{ $video->artist . ' - ' . $video->name }}">
		<span class="title" itemprop="name"><span class="artist">{{ $video->artist }}</span> - <span class="name">{{ $video->name }}</span></span>
		<img src="{{ url('videos/image/thumb/'.$video->slug.'.jpg') }}" alt="{{ $video->artist . ' - ' . $video->name }}" title="{{ $video->artist . ' - ' . $video->name }}" itemprop="image" />
		<div class="overlay"><span class="play-button"><span class="fa fa-play"></span></span></div>
		<div class="information">
			<time class="published" datetime="{{ $video->created_at->toAtomString() }}">{{ $video->created_at->diffForHumans() }}</time>,
			<span class="genre" itemprop="genre">{{ $video->genre->name }}</span>
		</div>
	</a>
	<meta itemprop="url" content="{{ url('videos/'.$video->slug) }}" />
</li>