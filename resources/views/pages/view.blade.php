@extends('layouts.app')

@section('title', $page->title.' | '.env('APP_NAME') )

@section('content')
    <section class="content clearfix">
        <main>
            <article class="text-page clearfix">
                <header class="section-header">
                    <h2>{{ $page->title }}</h2>
                </header>
                <p>{!! $page->content !!}</p>

            </article>
        </main>
        <section id="sidebar">
            @include('widgets.popular.widget')
        </section>
    </section>
@endsection
