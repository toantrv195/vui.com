<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Video;
use DB;
use Session;
class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user_id = Auth::guard()->id();
    $user = User::find($user_id);
    

    if ($user->role == 1 ) {
        return redirect()->route('admin.cate.index');
     } else {
        return redirect()->route('page.gethome');
     }
     
  }

//home page
  public function homepage(Request $request)
  {
    $product = DB::table('products')
                    ->join('users', 'users.id', '=' , 'products.user_id')
                    ->select('products.*', 'users.*')->orderBy('products.id', 'DESC')->paginate(4);
    
    if ($request->ajax()) {
        $view = view('data', compact('product'))->render();
        return response()->json(['html' => $view]);
    }

      return view('homepage.pages.home', compact('product'));
  }

  //category
  public function getcategory($alias)
  {
    $category = DB::table('categories')->select('id', 'name', 'alias')->where('alias', $alias)->first();
    $product_cate = DB::table('products')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->select('products.*', 'users.*')->where('products.cate_id', $category->id)->orderBy('products.id', 'DESC')->paginate(8);
    
    return view('homepage.pages.category', compact('product_cate', 'category'));
  }

  //detail
  public function getdetail($alias)
  {
    $view = DB::table('products')->select('id','title', 'alias', 'view')->where('alias', $alias)->first();
   
    $product = Product::find($view->id);
    
    
    if(!Session::has('ISREAD'.$view->id))
    {
        Session::put('ISREAD'.$view->id, 'value');
        $product->view = $view->view + 1;
    }
    $product->save();

    $product_detail = DB::table('products')
    ->join('users', 'users.id', '=', 'products.user_id')
     ->select('products.*', 'users.*')->where('products.alias', $alias)->first();


    $images = DB::table('product_images')->select('id', 'image', 'product_id')
      ->where('product_id', $product->id)->get();
    
    $product_cate = DB::table('products')->where('cate_id', $product->cate_id)
        ->where('alias', '<', $product->alias)->orderBy('id', 'DESC')->get();

    //prev
        $prev = DB::table('products')->where('cate_id', $product->cate_id)
            ->where('id', '<', $product->id)->orderBy('id', 'DESC')->first();
    //next

        $next = DB::table('products')->where('cate_id', $product->cate_id)
        ->where('id', '>', $product->id)->first();
        

    return view('homepage.pages.detail', compact('product_detail', 'images', 'product_cate', 'prev', 'next'));
  }

  // user upload
  public function userupload($name)
  {
    $user = DB::table('users')->select('*')->where('name', $name)->first();
    $user_product = DB::table('products')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->select('products.*', 'users.*')->where('products.user_id', $user->id)->orderBy('products.id', 'DESC')->paginate(8);

    return view('homepage.pages.uploaduser', compact('user_product'));
    
  }

  //video
  public function videocate($alias, Request $request)
  {
    $videos = DB::table('videos')
      ->join('users', 'users.id', '=', 'videos.user_id')
    ->select('videos.*', 'users.*')->orderBy('videos.id', 'DESC')->paginate(2);

    if ($request->ajax()) {
      $view = view('datavideo', compact('videos'))->render();
      return response()->json(['html'=>$view]);
    }

    return view('homepage.pages.video', compact('videos'));
  }

  public function videodetail($alias)
  {
    //view ++
    $view = DB::table('videos')->select('id','introduce', 'alias', 'view')->where('alias', $alias)->first();
   
    $video = Video::find($view->id);
    
    
    if(!Session::has('ISREAD'.$view->id))
    {
        Session::put('ISREAD'.$view->id, 'value');
        $video->view = $view->view + 1;
    }
    $video->save();

    //detail video
    $video_detail = DB::table('videos')
    ->join('users', 'users.id', '=', 'videos.user_id')
     ->select('videos.*', 'users.*')->where('videos.alias', $alias)->first();


    // video category
    $video_cate = DB::table('videos')
        ->where('alias', '<', $video->alias)->orderBy('id', 'DESC')->get();

    return view('homepage.pages.video_detail', compact('video_detail', 'video_cate')); 
  }
    
  // search
  public function search(Request $request)
  {
    $search = $request->txtsearch;
    $products = DB::table('products')
                    ->join('users', 'users.id', '=' , 'products.user_id')
                    ->select('products.*', 'users.*')
                    ->where('products.title', 'like', '%' .$search. '%')
                    ->orWhere('products.intro', 'like', '%' .$search. '%')
                    ->orderBy('products.id', 'DESC')->paginate(4);

    return view('homepage.pages.search', compact('products', 'search'));
  }

  //
  public function loadmore()
  {
    $product = Product::select('*')->get()->toArray();
    
    return $product;
  }
}
