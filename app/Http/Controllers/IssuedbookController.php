<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssuedbookController extends Controller
{
    //
    function index(){
        return view('issuedbooks.index');
    }
}
