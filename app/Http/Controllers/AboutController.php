<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     *
     */
    public function index() {
        return view('pages.about');
    }

    public function create(Request $request) {

       About::create($request->all());  
        return view('pages.about');
    }
}
