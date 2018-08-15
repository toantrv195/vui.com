<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Product_image;
use App\Video;
use DB;
use Auth;
use App\Http\Requests\UploadvideoRequest;
use App\Http\Requests\UploadimageRequest;

class UploadController extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('homepage.upload.index');

    }
    // img
    public function getImage()
    {
        $cates = DB::table('categories')->select('id', 'name')->get();

    	return view('homepage.upload.image.create', compact('cates'));
    }

    public function postImage(UploadimageRequest $request)
    {
        $image = $request->file('fImages');

        $filename = $request->file('fImages')->getClientOriginalName();
        $path = public_path('upload/images/' . $filename);
        Image::make($image->getRealPath())->resize(337 , 247)->save($path);

        $product = new Product();
        $product->title = $request->title;
        $product->alias = changeTitle($request->title);
        $product->intro = $request->txtIntro;
        $product->image = $filename;
        $product->view = 0;
        $product->comment = 0;
        $product->hot = null;
        $product->source = $request->source;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $request->cate;
        $product->save();
        $request->file('fImages')->move('upload/images/details/', $filename);
        $alias = $product->alias;
        $product_id = $product->id;

        if ($request->hasFile('addimages')) {

            foreach ($request->file('addimages') as $file) {
                $product_img = new Product_image();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('upload/images/details/', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('detail', $alias);
    }

    //delete image user
    public function delete($alias)
    {
        $product = Product::select('*')->where('alias', $alias)->first();
        $product->delete();

        return redirect()->route('home.index');
    }

    // video

    public function getVideo()
    {
        return view('homepage.upload.video.create');
    }

    public function postVideo(UploadvideoRequest $request)
    {
        $video = new Video();
        $video->introduce = $request->title;
        $video->alias = changeTitle($request->title);
        $video->video_name = null;
        $video->image = null;
        $video->link = $request->link;
        $video->view = 0;
        $video->comment = 0;
        $video->source = $request->source;
        $video->user_id = Auth::user()->id;
        $video->cate_id = 8;
        $video->save();
        $alias = $video->alias;

        return redirect()->route('video.detail', $alias);
    }

    public function deletevideo($alias)
    {
        $video = Video::select('*')->where('alias', $alias)->first();
        $video->delete();

        return redirect()->route('home.index');
    }
}
