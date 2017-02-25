<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests\ProductRequest;

use App\Category;
use App\Product;
use Auth;
use App\Product_image;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
    	return view('admin.product.list', compact('products'));
    }

    public function create()
    {   
        $cate = Category::select('id', 'name')->get();
        return view('admin.product.add', compact('cate'));
    }

    public function store(ProductRequest $request)
    {
        $filename = $request->file('fImages')->getClientOriginalName();
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->intro = $request->txtIntro;
        $product->image = $filename;
        $product->view = 0;
        $product->comment = 0;
        $product->hot = $request->rdoStatus;
        $product->source = $request->source;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $request->category;
        $product->save();
        $request->file('fImages')->move('upload/images/', $filename);
        $product_id = $product->id;

        if ($request->hasFile('Image_details')) {
            foreach ($request->file('Image_details') as $file) {
                $product_img = new Product_image();
                if (isset($file)) {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('upload/images/details/', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        return redirect()->route('admin.product.index')
            ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Add Product']);
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
    	
    }
}
