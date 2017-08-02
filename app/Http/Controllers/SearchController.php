<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Album;
use App\Mixtape;
use App\Video;
use App\Genre;

use App\Page;

class SearchController extends Controller
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
    public function index(Request $request)
    {
        $where = [['status','=','enabled'],['artist','LIKE','%'.$request->q.'%']];
        $orWhere = [['status','=','enabled'],['name','LIKE','%'.$request->q.'%']];
        if( $request->has('genre') )
        {
            $tag = Genre::where('slug',$request->genre)->first();
            if( $tag )
            {
                $where[] = ['genre_id','=',$tag->id];
                $orWhere[] = ['genre_id','=',$tag->id];
            }
        }
        $tracks = Track::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->limit(10)->get();
        $albums = Album::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->limit(3)->get();
        $mixtapes = Mixtape::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->limit(3)->get();
        $videos = Video::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->limit(3)->get();
        return view('search.index', ['tracks'=>$tracks,'albums'=>$albums,'mixtapes'=>$mixtapes,'videos'=>$videos]);
    }

    public function tracks(Request $request)
    {
        $where = [['status','=','enabled'],['artist','LIKE','%'.$request->q.'%']];
        $orWhere = [['status','=','enabled'],['name','LIKE','%'.$request->q.'%']];
        if( $request->has('genre') )
        {
            $tag = Genre::where('slug',$request->genre)->first();
            if( $tag )
            {
                $where[] = ['genre_id','=',$tag->id];
                $orWhere[] = ['genre_id','=',$tag->id];
            }
        }
        $tracks = Track::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->paginate(20);
        return view('search.tracks', ['tracks'=>$tracks]);
    }

    public function albums(Request $request)
    {
        $where = [['status','=','enabled'],['artist','LIKE','%'.$request->q.'%']];
        $orWhere = [['status','=','enabled'],['name','LIKE','%'.$request->q.'%']];
        if( $request->has('genre') )
        {
            $tag = Genre::where('slug',$request->genre)->first();
            if( $tag )
            {
                $where[] = ['genre_id','=',$tag->id];
                $orWhere[] = ['genre_id','=',$tag->id];
            }
        }
        $albums = Album::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->paginate(20);
        return view('search.albums', ['albums'=>$albums]);
    }

    public function mixtapes(Request $request)
    {
        $where = [['status','=','enabled'],['artist','LIKE','%'.$request->q.'%']];
        $orWhere = [['status','=','enabled'],['name','LIKE','%'.$request->q.'%']];
        if( $request->has('genre') )
        {
            $tag = Genre::where('slug',$request->genre)->first();
            if( $tag )
            {
                $where[] = ['genre_id','=',$tag->id];
                $orWhere[] = ['genre_id','=',$tag->id];
            }
        }
        $mixtapes = Mixtape::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->paginate(20);
        return view('search.mixtapes', ['mixtapes'=>$mixtapes]);
    }

    public function videos(Request $request)
    {
        $where = [['status','=','enabled'],['artist','LIKE','%'.$request->q.'%']];
        $orWhere = [['status','=','enabled'],['name','LIKE','%'.$request->q.'%']];
        if( $request->has('genre') )
        {
            $tag = Genre::where('slug',$request->genre)->first();
            if( $tag )
            {
                $where[] = ['genre_id','=',$tag->id];
                $orWhere[] = ['genre_id','=',$tag->id];
            }
        }
        $videos = Video::where($where)->orWhere($orWhere)->orderBy('created_at','desc')->paginate(20);
        return view('search.videos', ['videos'=>$videos]);
    }
}
