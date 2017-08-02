@extends('layouts.app')

@section('title', $video->artist . ' - ' . $video->name . ' Video Stream | ' . env('APP_NAME') )
@section('og_title', 'Watch ' . $video->artist . ' video ' . $video->name . ' on ' . env('APP_NAME') )
@section('description', 'Stream ' . $video->artist . ' video ' . $video->name . ' from ' . env('APP_NAME') )
@section('keywords', $video->keywords)
@section('og_url',url('videos/'.$video->slug))
@section('og_image',url('videos/image/'.$video->slug.'.jpg'))
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
            <div class="data-holder" itemprop="video" itemscope itemtype="http://schema.org/MusicVideoObject">
                <article class="media-info clearfix">
                    <div class="image">
                        <img src="{{ url('videos/image/thumb/'.$video->slug.'.jpg') }}" alt="{{ $video->artist . ' - ' . $video->name }}" title="{{ $video->artist . ' - ' . $video->name }}" />
                    </div>
                    <div class="details">
                        <h1 itemprop="name"><strong class="artist">{{ $video->artist }}</strong><span class="name">{{ $video->name }}</span></h1>
                        <div class="information">
                            <span class="genre"><a href="{{ url('/search?q=&genre='.$video->genre->slug) }}" itemprop="genre">{{ $video->genre->name }}</a></span>
                            <time class="added" datetime="{{ $video->created_at->toAtomString() }}">{{ $video->created_at->diffForHumans() }}</time>
                        </div>
                        <ul class="actions clearfix" data-url="{{ url('ajax/vote') }}" data-media="video" data-media-id="{{ $video->id }}"" data-token="">
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
                        </ul>
                    </div>
                    <meta itemprop="url" content="{{ url('videos/'.$video->slug) }}" />
                </article>
                <section class="social-section clearfix">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <div class="g-plusone" data-size="medium"></div>
                    <div class="fb-like" data-href="{{ url('videos/'.$video->slug) }}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </section>
                <section class="video-player">
                    <div class="video-container">
                        <iframe width="560" height="315" src="{{ getYoutubeEmbedUrl( $video->preview ) }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <meta itemprop="embedUrl" content="{{ $video->preview }}" />    </section>
            </div>
            @include('widgets.comments.widget', ['url'=>url('videos/'.$video->slug)])
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'videos'])
        </section>
    </section>
@endsection
