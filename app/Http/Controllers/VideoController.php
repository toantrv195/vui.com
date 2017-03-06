<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
        
use App\Http\Requests\VideoRequest;
use App\Video;
use App\Category;
use Auth;
use DB;
use File;

class VideoController extends Controller
{
    public function index()
    {
        $videos = DB::table('videos')->select('*')->orderBy('id', 'DESC')->get();
        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video.add');
    }

    public function store(VideoRequest $request)
    {
        $file_name = $request->file('fImages')->getClientOriginalName();
        $file_video_name = $request->file('fVideo')->getClientOriginalName();
        $video = new Video();
        $video->introduce = $request->txtIntro;
        $video->alias = changeTitle($request->txtIntro);
        $video->video_name = $file_video_name;
        $video->image = $file_name;
        $video->link = $request->link;
        $video->view = 0;
        $video->comment = 0;
        $video->source = $request->source;
        $video->user_id = Auth::user()->id;
        $video->cate_id = $request->cate;
        $request->file('fImages')->move('upload/videos/images/', $file_name);
        $request->file('fVideo')->move('upload/videos', $file_video_name);
        $video->save();

        return redirect()->route('admin.video.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete Add New Video']);

    }

    public function edit($id)
    {
        $cate = Category::all();
        $video = Video::find($id);
         return view('admin.video.edit', compact('video', 'cate'));
    }

    public function update($id, Request $request)
    {
        $video = Video::find($id);
        $video->introduce = $request->txtIntro;
        $video->alias = changeTitle($request->txtIntro);
        $video->video_name = $request->input('video_current');
        $video->image = $request->input('img_current');
        $video->link = $request->link;
        $video->view = 0;
        $video->comment = 0;
        $video->source = $request->source;
        $video->user_id = Auth::user()->id;
        $video->cate_id = $request->cate;
        $video->save();

       return redirect()->route('admin.video.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete Update Video']);
    }

    public  function destroy($id)
    {
        $video = Video::find($id);
        File::delete('upload/videos/images/'.$video->image);
        File::delete('upload/videos/'.$video->video_name);
        $video->delete();

        return redirect()->route('admin.video.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complete Delete Video']);
    }
}
