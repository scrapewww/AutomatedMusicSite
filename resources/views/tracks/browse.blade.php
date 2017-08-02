@extends('layouts.app')

@section('title','Free HipHop Mp3 Downloads '.(Request::has('page')?'- Page '.Request::input('page').' ' : '').'| '.env('APP_NAME') )
@section('og_url',url('tracks'))

@section('content')
    <section class="content clearfix">
        <main>
            <section class="tracks-page clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header">
                    <h2 itemprop="name">Tracks</h2>
                </header>
                <ul class="tracks-list">
                    @foreach( $tracks AS $track )
                        @include('tracks.block')
                    @endforeach
                </ul>
                {{ $tracks->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'tracks'])
        </section>
    </section>
@endsection
