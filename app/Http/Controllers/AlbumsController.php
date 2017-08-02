<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Album;

class AlbumsController extends Controller
{
    public function view($slug)
    {
        $album = Album::where('status','enabled')->where('slug',$slug)->firstOrFail();
        $album->addVisit();
        $image = Image::make( storage_path('app/public/images/album/'.$album->image) );
        return view('albums.view', ['album'=>$album,'image'=>$image]);
    }

    public function viewTrack($slug1,$slug2,$slug3)
    {
        $album = Album::where('status','enabled')->where('slug',$slug1)->firstOrFail();
        $tracks = json_decode( $album->tracks, true );
        $track_id = $slug2-1;
        $track = $tracks[ $track_id ];
        $image = Image::make( storage_path('app/public/images/album/'.$album->image) );
        return view('albums.track', ['album'=>$album,'track'=>$track,'track_id'=>$track_id,'image'=>$image]);
    }

    public function browse(Request $request)
    {
        $albums = Album::where('status','enabled')->orderBy('created_at','desc')->paginate(12);
        return view('albums.browse', ['albums'=>$albums]);
    }
}
