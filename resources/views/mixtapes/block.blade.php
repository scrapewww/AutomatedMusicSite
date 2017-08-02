<li itemprop="itemListElement" itemscope itemtype="http://schema.org/MusicAlbum">
    <a href="{{ url('mixtapes/'.$mixtape->slug) }}" title="{{ $mixtape->artist.' - '.$mixtape->name  }}">
        <img src="{{ url('mixtapes/image/thumb/'.$mixtape->slug.'.jpg') }}" alt="{{ $mixtape->artist.' - '.$mixtape->name }}" title="{{ $mixtape->artist.' - '.$mixtape->name }}" itemprop="image" />
        <div class="overlay"><span class="artist" itemprop="byArtist">{{ $mixtape->artist }}</span> - <span class="name" itemprop="name">{{ $mixtape->name }}</span></div>
    </a>
    <div class="information">
        <time class="published" datetime="{{ $mixtape->created_at->toAtomString() }}">{{ $mixtape->created_at->diffForHumans() }}</time>,
        <span class="genre" itemprop="genre">{{ $mixtape->genre->name }}</span>
    </div>
    <meta itemprop="url" content="{{ url('mixtapes/'.$mixtape->slug) }}" />
    <meta itemprop="numTracks" content="{{ count( json_decode( $mixtape->tracks ) ) }}" />
</li>