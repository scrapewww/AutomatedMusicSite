@extends('layouts.app')

@section('title','Free Video Stream '.(Request::has('page')?'- Page '.Request::input('page').' ' : '').'| '.env('APP_NAME') )
@section('og_url',url('videos'))

@section('content')
    <section class="content clearfix">
        <main>
            <section class="videos-page clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header wide">
                    <h2 itemprop="name">Videos</h2>
                </header>
                <ul class="videos-list normal flex flex-wrap clearfix">
                    @foreach( $videos AS $video )
                        @include('videos.block')
                    @endforeach
                </ul>
                {{ $videos->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'videos'])
        </section>
    </section>
@endsection
