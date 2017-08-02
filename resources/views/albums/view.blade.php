@extends('layouts.app')

@section('title', $album->artist . ' - ' . $album->name . ' Album Zip Download | ' . env('APP_NAME') )
@section('og_title', 'Listen to ' . $album->artist . ' album ' . $album->name . ' on ' . env('APP_NAME') )
@section('description', 'Stream & Download ' . $album->artist . ' - ' . $album->name . ' from ' . env('APP_NAME') )
@section('keywords', $album->keywords)
@section('og_url',url('albums/'.$album->slug))
@section('og_image',url('albums/image/'.$album->slug.'.jpg'))
@section('og_image_width', $image->width())
@section('og_image_height', $image->height())

@push('scripts')
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '',
            xfbml      : true,
            version    : 'v2.4'
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
@endpush

@push('head_ads')
@include('blocks.popads')
@endpush

@section('content')
    <section class="content clearfix">
        <main>
            <div class="data-holder" itemscope itemtype="http://schema.org/MusicAlbum">
                <article class="media-info clearfix">
                    <div class="image">
                        <img src="{{ url('albums/image/thumb/'.$album->slug.'.jpg') }}" alt="{{ $album->artist.' - '.$album->name }}" title="{{ $album->artist.' - '.$album->name }}" itemprop="image" />
                    </div>
                    <div class="details">
                        <h1><strong class="artist" itemprop="byArtist">{{ $album->artist }}</strong><span class="name" itemprop="name">{{ $album->name }}</span></h1>
                        <div class="information">
                            <span class="genre"><a href="{{ url('/search?q=&genre='.$album->genre->slug) }}" itemprop="genre">{{ $album->genre->name }}</a></span>
                            <time class="added" datetime="{{ $album->created_at->toAtomString() }}">{{ $album->created_at->diffForHumans() }}</time>
                        </div>
                        <ul class="actions clearfix" data-url="{{ url('ajax/vote') }}" data-media="album" data-media-id="{{ $album->id }}" data-token="">
                            <li class="like " data-action="like">
                                <a href="#">
                        <span class="icon">
                            <span class="fa fa-thumbs-up"></span>
                            <span class="text">like</span>
                        </span>
                                    <span class="count">0</span>
                                </a>
                            </li>
                            <li class="dislike " data-action="dislike">
                                <a href="#">
                                    <span class="icon"><span class="fa fa-thumbs-down"></span></span>
                                    <span class="count">0</span>
                                </a>
                            </li>
                            <li class="download"><a href="{{ $album->download }}" target="_blank">Download</a></li>
                        </ul>
                    </div>
                    <meta itemprop="url" content="{{ url('albums/'.$album->slug) }}" />
                    <meta itemprop="numTracks" content="{{ count( json_decode( $album->tracks ) ) }}" />
                </article>
                <section class="social-section clearfix">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <div class="g-plusone" data-size="medium"></div>
                    <div class="fb-like" data-href="{{ url('albums/'.$album->slug) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </section>
                <section class="album-tracks clearfix">
                    <section class="player clearfix"><div class="player-init playlist" data-playlist="ol.tracklist"></div></section>
                    <ol class="tracklist">
                        <?php $trackCount = 1; ?>
                        @foreach( json_decode( $album->tracks ) AS $track )
                            @include('albums.blocks.track')
                            <?php $trackCount++; ?>
                        @endforeach
                    </ol>
                </section>
            </div>
            @include('widgets.comments.widget',['url'=>url('albums/'.$album->slug)])
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'albums'])
        </section>
    </section>
@endsection
