@extends('layouts.app')

@section('title', 'Searching for ' . Request::input('q') . ' | ' . env('APP_NAME') )

@section('content')
    <section class="content clearfix">
        <main>
            <section class="tracks-search clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header">
                    <h2 itemprop="name"><a href="{{ url('search/tracks?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">Tracks results</a></h2>
                    <span class="actions">
                        <a class="view-all" href="{{ url('search/tracks?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">All</a>
                    </span>
                </header>
                <ul class="tracks-list">
                    @foreach($tracks AS $track)
                        @include('tracks.block')
                    @endforeach
                </ul>
            </section>
            <section class="albums-results search-section clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header">
                    <h2 itemprop="name"><a href="{{ url('search/albums?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">Albums results</a></h2>
                    <span class="actions">
                        <a class="view-all" href="{{ url('search/albums?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">All</a>
                    </span>
                </header>
                <ul class="albums-list clearfix">
                    @foreach($albums AS $album)
                        @include('albums.block')
                    @endforeach
                </ul>
            </section>
            <section class="mixtapes-results search-section clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header">
                    <h2 itemprop="name"><a href="{{ url('search/mixtapes?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">Mixtapes results</a></h2>
                    <span class="actions">
                        <a class="view-all" href="{{ url('search/mixtapes?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">All</a>
                    </span>
                </header>
                <ul class="albums-list clearfix">
                    @foreach($mixtapes AS $mixtape)
                        @include('mixtapes.block')
                    @endforeach
                </ul>
            </section>
            <section class="videos-results search-section clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header wide">
                    <h2 itemprop="name"><a href="{{ url('search/videos?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">Videos results</a></h2>
                    <span class="actions">
                        <a class="view-all" href="{{ url('search/videos?q='.Request::input('q')).(Request::has('genre')?'&genre='.Request::input('genre'):'') }}">All</a>
                    </span>
                </header>
                <ul class="videos-list normal clearfix">
                    @foreach($videos AS $video)
                        @include('videos.block')
                    @endforeach
                </ul>
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget')
        </section>
    </section>
@endsection
