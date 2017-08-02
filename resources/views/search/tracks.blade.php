@extends('layouts.app')

@section('title', 'Searching tracks for ' . Request::input('q') . ' | ' . env('APP_NAME') )

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
                {{ $tracks->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget')
        </section>
    </section>
@endsection
