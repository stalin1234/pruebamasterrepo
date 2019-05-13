<?php

namespace App\Http\Controllers;

use App\Worker;
use App\Http\Requests;
use Illuminate\Http\Request;

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
        $workers = Worker::where('state',1);

        return view('home')->with('workers',$workers->get());
    }

    public function welcome(){
        if (\Auth::check()) {
            return redirect('/home');
        }
        return redirect('/');
    }
}
