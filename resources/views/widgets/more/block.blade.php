<li>
    <a href="{{ url('albums/'.$album->slug.'/'.$trackCount.'-'.str_slug( $track->name ) ) }}" title="{!! htmlspecialchars($album->artist.' - '.$track->name) !!} }}">
        <strong class="artist">{{ $album->artist }}</strong>
        <span class="title">{{ $track->name }}</span>
    </a>
</li>