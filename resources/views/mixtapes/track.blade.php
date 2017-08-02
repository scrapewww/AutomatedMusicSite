@extends('layouts.app')

@section('title', $mixtape->artist . ' - ' . $track['name'] . ' MP3 Download | ' . env('APP_NAME') )
@section('og_title', 'Listen to ' . $mixtape->artist . ' mixtape ' . $track['name'] . ' on ' . env('APP_NAME') )
@section('description', 'Stream & Download ' . $mixtape->artist . ' - ' . $track['name'] . ' from ' . env('APP_NAME') )
@section('keywords', $mixtape->keywords)
@section('og_url',url('mixtapes/'.$mixtape->slug.'/'.$track_id.'-'.str_slug($track['name']) ))
@section('og_image',url('mixtapes/image/'.$mixtape->slug.'.jpg'))
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
                        <img src="{{ url('mixtapes/image/'.$mixtape->slug.'.jpg') }}" alt="{{ $mixtape->artist.' - '.$track['name'] }}" title="{{ $mixtape->artist.' - '.$track['name'] }}" itemprop="image" />
                    </div>
                    <div class="details">
                        <h1>
                            <strong class="artist" itemprop="byArtist">{{ $mixtape->artist }}</strong>
                            <span class="name" itemprop="name">{{ $track['name'] }}</span>
                        </h1>
                        <div class="information">
                            <span class="genre"><a href="{{ url('/search?q=&genre='.$mixtape->genre->slug) }}" itemprop="genre">{{ $mixtape->genre->name }}</a></span>
                            <time class="added" datetime="{{ $mixtape->created_at->toAtomString() }}">{{ $mixtape->created_at->diffForHumans() }}</time>
                        </div>
                        <ul class="actions clearfix" data-url="{{ url('ajax/vote') }}" data-media="" data-media-id="" data-token="">
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
                            <li class="download"><a href="{{ $track['url']  }}" target="_blank">Download</a></li>
                        </ul>
                    </div>
                    <meta itemprop="url" content="{{ url('mixtapes/'.$mixtape->slug.'/'.$track_id.'-'.str_slug($track['name']) ) }}" />
                </article>
                <section class="social-section clearfix">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <div class="g-plusone" data-size="medium"></div>
                    <div class="fb-like" data-href="{{ url('mixtapes/'.$mixtape->slug.'/'.$track_id.'-'.str_slug($track['name']) ) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </section>
                <section class="player clearfix">
                    <audio src="{{ $track['url'] }}" preload="auto"></audio>
                </section>
            </div>

            @include('widgets.comments.widget',['url'=>url('mixtapes/'.$mixtape->slug.'/'.$track_id.'-'.str_slug($track['name']) )])
        </main>
        <section id="sidebar">

        </section>
    </section>
@endsection
