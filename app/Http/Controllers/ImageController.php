<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Mixtape;
use App\Track;
use App\Video;
use App\Album;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function trackImage($slug)
    {
        $track = Track::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/track/'.$track->image);
        return Image::make($image)->response();
    }

    public function trackImageThumb($slug)
    {
        $track = Track::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/track/'.$track->image);
        return Image::make($image)->fit(350)->response();
    }

    public function albumImage($slug)
    {
        $track = Album::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/album/'.$track->image);
        return Image::make($image)->response();
    }

    public function albumImageThumb($slug)
    {
        $track = Album::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/album/'.$track->image);
        return Image::make($image)->fit(350)->response();
    }

    public function mixtapeImage($slug)
    {
        $track = Mixtape::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/mixtape/'.$track->image);
        return Image::make($image)->response();
    }

    public function mixtapeImageThumb($slug)
    {
        $track = Mixtape::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/mixtape/'.$track->image);
        return Image::make($image)->fit(350)->response();
    }

    public function videoImage($slug)
    {
        $track = Video::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/video/'.$track->image);
        return Image::make($image)->response();
    }

    public function videoImageThumb($slug)
    {
        $track = Video::where('slug',$slug)->firstOrFail();
        $image = storage_path('app/public/images/video/'.$track->image);
        return Image::make($image)->fit(320,180)->response();
    }
}
