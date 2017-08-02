@extends('layouts.app')

@section('title', 'Searching mixtapes for ' . Request::input('q') . ' | ' . env('APP_NAME') )

@section('content')
    <section class="content clearfix">
        <main>
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
                {{ $mixtapes->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget')
        </section>
    </section>
@endsection
