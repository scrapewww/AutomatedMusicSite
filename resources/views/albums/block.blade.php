<li itemprop="itemListElement" itemscope itemtype="http://schema.org/MusicAlbum">
    <a href="{{ url('albums/'.$album->slug) }}" title="{{ $album->artist.' - '.$album->name  }}">
        <img src="{{ url('albums/image/thumb/'.$album->slug.'.jpg') }}" alt="{{ $album->artist.' - '.$album->name }}" title="{{ $album->artist.' - '.$album->name }}" itemprop="image" />
        <div class="overlay"><span class="artist" itemprop="byArtist">{{ $album->artist }}</span> - <span class="name" itemprop="name">{{ $album->name }}</span></div>
    </a>
    <div class="information">
        <time class="published" datetime="{{ $album->created_at->toAtomString() }}">{{ $album->created_at->diffForHumans() }}</time>,
        <span class="genre" itemprop="genre">{{ $album->genre->name }}</span>
    </div>
    <meta itemprop="url" content="{{ url('albums/'.$album->slug) }}" />
    <meta itemprop="numTracks" content="{{ count( json_decode( $album->tracks ) ) }}" />
</li>