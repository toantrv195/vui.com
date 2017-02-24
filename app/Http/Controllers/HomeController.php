<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
             // return view('admin.category.list');
            return redirect()->route('admin.cate.index');
         } else {
            return view('homepage.pages.home');
         }
       
    }
}
