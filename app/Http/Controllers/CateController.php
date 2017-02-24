<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\Category;

class CateController extends Controller
{

    public function index()
    {
    	$data = Category::select('id', 'name')->orderBy('id', 'DESC')->get(); 
        return view('admin.category.list', compact('data'));
    }

    public function create()
    {
    	return view('admin.category.add');
    }

    public function store(CateRequest $request)
    {
    	$category = new Category();
    	$category->name = $request->txtCateName;
    	$category->alias = changeTitle($request->txtCateName);
    	$category->save();

    	return redirect()->route('admin.cate.index')
    			->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Add Category']);
    }

    //edit
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $cate = Category::find($id);
        
        $cate->name = $request->txtCateName;
        $cate->alias = changeTitle($request->txtCateName);
        $cate->save();

        return redirect()->route('admin.cate.index')
                ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate update Category']);


    }

    //delete

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.cate.index')
                ->with(['flash_level' => 'success', 'flash_message' => 'Success !! Complate Delete Category']);
    }
}
