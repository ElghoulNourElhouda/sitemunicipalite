<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Facades\Datatables;
use App\Article;
use App\Offre;

class ArticlesDTController extends Controller {
    /*
     * 
     */

    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     */
    public function getBasicData() {

        $offres = Offre::select(['id', 'work', 'level', 'formation', 'location']);
        return Datatables::of($offres)->make();

        //return Datatables::of(Article::query())->make();
    }

    /**
     * Process datatables ajax request.
     */
    public function AddEditRemoveColumn() {

        $offres = Offre::select(['id', 'work', 'level', 'formation', 'location']);

        // return Datatables::of($offres)
        // ->addColumn('action', function ($offre) {
        //     return '<a href="" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        // })
        // ->editColumn('id', 'ID: {{$id}}')
        // ->make(true);
        return Datatables::of($offres)->make();

        //return Datatables::of(Article::query())->make();
    }


}
