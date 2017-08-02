@extends('layouts.app')

@section('title', $track->artist . ' - ' . $track->name . ' Mp3 Download | ' . env('APP_NAME') )
@section('og_title', 'Listen to ' . $track->artist . ' - ' . $track->name . ' on ' . env('APP_NAME') )
@section('description', 'Stream & Download ' . $track->artist . ' - ' . $track->name . ' from ' . env('APP_NAME') )
@section('keywords', $track->keywords)
@section('og_url',url('tracks/'.$track->slug))
@section('og_image',url('tracks/image/'.$track->slug.'.jpg'))
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
            <div class="data-holder" itemprop="track" itemscope itemtype="http://schema.org/MusicRecording">
                <article class="media-info clearfix">
                    <div class="image">
                        <img src="{{ url('tracks/image/thumb/'.$track->slug.'.jpg') }}" alt="{{ $track->artist.' - '.$track->name }}" title="{{ $track->artist.' - '.$track->name }}" itemprop="image" />
                    </div>
                    <div class="details">
                        <h1>
                            <strong class="artist" itemprop="byArtist">{{ $track->artist }}</strong>
                            <span class="name" itemprop="name">{{ $track->name }}</span>
                        </h1>
                        <div class="information">
                            <span class="genre"><a href="{{ url('/search?q=&genre='.$track->genre->slug) }}" itemprop="genre">{{ $track->genre->name }}</a></span>
                            <time class="added" datetime="{{ $track->created_at->toAtomString() }}">{{ $track->created_at->diffForHumans() }}</time>
                        </div>
                        <ul class="actions clearfix" data-url="{{ url('ajax/vote') }}" data-media="track" data-media-id="{{ $track->id }}" data-token="">
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
                            <li class="download"><a href="{{ $track->download }}" rel="nofollow" title="{{ $track->artist.' - '.$track->name }}" target="_blank">Download</a></li>
                        </ul>
                    </div>
                    <meta itemprop="url" content="{{ url('tracks/'.$track->slug) }}" />
                </article>
                <section class="social-section clearfix">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <div class="g-plusone" data-size="medium"></div>
                    <div class="fb-like" data-href="{{ url('tracks/'.$track->slug) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </section>
                <section class="player clearfix">
                    <audio src="{{ $track->preview }}" preload="auto"></audio>
                </section>
            </div>
            @include('widgets.related.widget', ['genre_id'=>$track->genre_id,'type'=>'tracks'])
            @include('widgets.comments.widget', ['url'=>url('tracks/'.$track->slug)])
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'tracks'])
        </section>
    </section>
@endsection
