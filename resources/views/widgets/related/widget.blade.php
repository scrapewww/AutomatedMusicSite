<?php
    $genre_id = isset( $genre_id ) ? $genre_id : 1;
    $type = isset( $type ) ? $type : 'tracks';

    switch( $type ) {
        case "tracks":
            $relateds = \App\Track::where('genre_id',$genre_id)->where('id','!=',$track->id)->orderBy('created_at','desc')->limit(5)->get();
            break;
    }
?>
<section class="related clearfix" itemscope itemtype="http://schema.org/ItemList">
    <header class="section-header">
        <h2 itemprop="name">Related</h2>
    </header>
    <ul class="tracks-list">
        @foreach( $relateds AS $related )
            @include('widgets.related.block')
        @endforeach
    </ul>
</section>