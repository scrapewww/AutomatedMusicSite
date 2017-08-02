<?php
function mp3_url($url)
{
    $e = explode('/', $url);
    $file_id = $e[ count( $e ) - 1 ];
    $replace = str_replace( $file_id, 'mp3embed-'.$file_id.'.mp3', $url);
    return $replace;
}
function getYoutubeEmbedUrl($url)
{
    $youtube_id = '';
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}