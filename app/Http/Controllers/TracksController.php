<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Track;
use App\Genre;
use Carbon\Carbon;

class TracksController extends Controller
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
        $track = Track::where('status','enabled')->where('slug',$slug)->firstOrFail();

        //$track->addVisitThatExpiresAt(Carbon::now()->addHours(3));
        $track->addVisit();

        $image = Image::make( storage_path('app/public/images/track/'.$track->image) );

        return view('tracks.view', ['track'=>$track,'image'=>$image]);
    }

    public function browse(Request $request)
    {
        $tracks = Track::where('status','enabled')->orderBy('created_at','desc')->paginate(20);
        return view('tracks.browse', ['tracks'=>$tracks]);
    }
}
