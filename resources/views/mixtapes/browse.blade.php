@extends('layouts.app')

@section('title','Free HipHop Mixtape Downloads '.(Request::has('page')?'- Page '.Request::input('page').' ' : '').'| '.env('APP_NAME') )
@section('og_url',url('tracks'))

@section('content')
    <section class="content clearfix">
        <main>
            <section class="albums-page clearfix" itemscope itemtype="http://schema.org/ItemList">
                <header class="section-header">
                    <h2 itemprop="name">Mixtapes</h2>
                </header>
                <ul class="albums-list clearfix">
                    @foreach( $mixtapes AS $mixtape )
                        @include('mixtapes.block')
                    @endforeach
                </ul>
                {{ $mixtapes->links() }}
            </section>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget',['type'=>'mixtapes'])
        </section>
    </section>
@endsection
