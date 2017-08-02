<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Track;
use App\Video;
use App\Genre;
use Carbon\Carbon;

class VideosController extends Controller
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
    public function view($slug)
    {
        $video = Video::where('status','enabled')->where('slug',$slug)->firstOrFail();

        //$track->addVisitThatExpiresAt(Carbon::now()->addHours(3));
        $video->addVisit();

        $image = Image::make( storage_path('app/public/images/video/'.$video->image) );

        return view('videos.view', ['video'=>$video,'image'=>$image]);
    }

    public function browse(Request $request)
    {
        $videos = Video::where('status','enabled')->orderBy('created_at','desc')->paginate(12);

        return view('videos.browse', ['videos'=>$videos]);
    }
}
