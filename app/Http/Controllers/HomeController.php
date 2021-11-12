<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\member;
use App\Models\issuedbook;

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
        $members=member::count();
        $books=book::count();
        $issuedbooks=issuedbook::count();
        return view('home',compact('members','books','issuedbooks'));
    }
}
