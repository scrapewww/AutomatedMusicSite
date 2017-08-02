<?php
    $more = isset( $album ) ? $album : $mixtape;
?>
<section class="popular">
    <header>
        <h2>More from {{ isset( $type ) ? $type : '' }}</h2>
    </header>
    <ol class="popular">
        <?php $trackCount = 1; ?>
        @foreach( json_decode( $more->tracks ) AS $track )
            @include('widgets.more.block')
            <?php $trackCount++; ?>
        @endforeach
    </ol>
</section>