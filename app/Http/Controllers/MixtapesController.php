<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Track;
use App\Album;
use App\Mixtape;
use App\Genre;
use Carbon\Carbon;

class MixtapesController extends Controller
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
        $mixtape = Mixtape::where('status','enabled')->where('slug',$slug)->firstOrFail();

        //$mixtape->addVisitThatExpiresAt(Carbon::now()->addHours(3));
        $mixtape->addVisit();

        $image = Image::make( storage_path('app/public/images/mixtape/'.$mixtape->image) );

        return view('mixtapes.view', ['mixtape'=>$mixtape,'image'=>$image]);
    }

    public function viewTrack($slug1,$slug2,$slug3)
    {
        $mixtape = Mixtape::where('status','enabled')->where('slug',$slug1)->firstOrFail();
        $tracks = json_decode( $mixtape->tracks, true );
        $track_id = $slug2-1;
        $track = $tracks[ $track_id ];

        $image = Image::make( storage_path('app/public/images/mixtape/'.$mixtape->image) );

        return view('mixtapes.track', ['mixtape'=>$mixtape,'track'=>$track,'track_id'=>$track_id,'image'=>$image]);
    }

    public function browse(Request $request)
    {
        $mixtapes = Mixtape::where('status','enabled')->orderBy('created_at','desc')->paginate(12);

        return view('mixtapes.browse', ['mixtapes'=>$mixtapes]);
    }
}
