@extends('layouts.app')

@section('title', 'Searching videos for ' . Request::input('q') . ' | ' . env('APP_NAME') )

@section('content')
    <section class="content clearfix">
        <main>
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
                {{ $videos->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget')
        </section>
    </section>
@endsection
