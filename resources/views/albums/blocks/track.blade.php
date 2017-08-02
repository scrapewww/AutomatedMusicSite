<li class="track" itemprop="track" itemscope itemtype="http://schema.org/MusicRecording" data-index="{{ $trackCount-1 }}" data-file="{{ mp3_url( $track->url ) }}">
    <a href="javascript:;" title="{{ $track->name }}" class="name clearfix">
        <span class="icon">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </span>
        <span class="name" itemprop="name">{{ $track->name }}</span>
    </a>
    <ul class="actions">
        <li class="play"><span>Play</span></li>
        <li><a href="{{ $track->url }}" target="_blank">Download</a></li>
    </ul>
    <meta itemprop="url" content="{{ url('albums/'.$album->slug.'/'.$trackCount.'-'.str_slug( $track->name ) ) }}" />
</li>