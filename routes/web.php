<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/', 'IndexController@index')->name('index');

Route::prefix('tracks')->group(function () {
    Route::get('image/{slug}.jpg', 'ImageController@trackImage')->name('track-image');
    Route::get('image/thumb/{slug}.jpg', 'ImageController@trackImageThumb')->name('track-image-thumb');

    Route::get('/', 'TracksController@browse')->name('browse-tracks');
    Route::get('{slug}', 'TracksController@view')->name('view-track');
});

Route::prefix('albums')->group(function () {
    Route::get('image/{slug}.jpg', 'ImageController@albumImage')->name('album-image');
    Route::get('image/thumb/{slug}.jpg', 'ImageController@albumImageThumb')->name('album-image-thumb');

    Route::get('/', 'AlbumsController@browse')->name('browse-albums');
    Route::get('{slug}', 'AlbumsController@view')->name('view-album');
    Route::get('{slug1}/{slug2}-{slug3}', 'AlbumsController@viewTrack')->name('view-album-track');
});

Route::prefix('mixtapes')->group(function () {
    Route::get('image/{slug}.jpg', 'ImageController@mixtapeImage')->name('mixtape-image');
    Route::get('image/thumb/{slug}.jpg', 'ImageController@mixtapeImageThumb')->name('mixtape-image-thumb');

    Route::get('/', 'MixtapesController@browse')->name('browse-mixtapes');
    Route::get('{slug}', 'MixtapesController@view')->name('view-mixtape');
    Route::get('{slug1}/{slug2}-{slug3}', 'MixtapesController@viewTrack')->name('view-mixtape-track');
});

Route::prefix('videos')->group(function () {
    Route::get('image/{slug}.jpg', 'ImageController@videoImage')->name('video-image');
    Route::get('image/thumb/{slug}.jpg', 'ImageController@videoImageThumb')->name('video-image-thumb');

    Route::get('/', 'VideosController@browse')->name('browse-videos');
    Route::get('{slug}', 'VideosController@view')->name('view-video');
});

Route::prefix('search')->group(function() {
    Route::get('/', 'SearchController@index')->name('search');
    Route::get('tracks', 'SearchController@tracks')->name('search-tracks');
    Route::get('albums', 'SearchController@albums')->name('search-albums');
    Route::get('mixtapes', 'SearchController@mixtapes')->name('search-mixtapes');
    Route::get('videos', 'SearchController@videos')->name('search-videos');
});

Route::prefix('scrape')->group(function () {
    Route::get('tracks', 'ScrapeController@scrapeTracks');
    Route::get('albums', 'ScrapeController@scrapeAlbums');
    Route::get('mixtapes', 'ScrapeController@scrapeMixtapes');
    Route::get('videos', 'ScrapeController@scrapeVideos');
});

Route::get('{slug}','PagesController@view');
