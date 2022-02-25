<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use App\Reply;
use App\Comment;
use App\Condidature;
use Carbon\Carbon;
use App\Gestion\PhotoGestionInterface;
// use Request; // for use formRequest validation
use Illuminate\Notifications\Notification;
//use Illuminate\Http\Request; // second way, is to validate in the controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;

class ArticlesController extends Controller {
    /*
     * 
     */

    public function __construct() {
        //$this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
        //$this->middleware('auth', ['except' => ['index']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        //return \Auth::user();
        //$articles = Article::all();
        //$articles = Article::latest()->get();
        //$articles = Article::oldest()->get();
        //$articles = Article::orderBy('published_at', 'desc')->get(); // you can do this too
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();  // not give the articles that published in the future

        $articles = Article::latest('created_at')->paginate(4);


       // return view('articles.index', compact('articles'));
        return view('articles.articles', compact('articles'));

    }

    public function self() {

        if (!Auth::guest() && Auth::User()->agent) {
            $articles = Article::where('users_id',Auth::id())->latest('created_at')->paginate(8);

            return view('EspaceEntreprise.offresList', compact('articles'));
        }else{
            return back();
        }
    }

    public function list() {

        $articles = Article::where('users_id',Auth::id())->latest('created_at')->get();

        return view('settings.articles', compact('articles'));
    }

    // public function mesOffres() {

    //     $articles = Article::where('users_id',Auth::id())->latest('created_at')->get();

    //     return view('EspaceEntreprise.offresList', compact('articles'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
//        $article = Article::find($id);
//        if(is_null($article)){
//            abort(404);
//        }
        $article = Article::findOrFail($id);
        $comments = Comment::where('article_id',$id)->get();
        $replies = Reply::all();

        //dd($article->published_at);
        //dd($article->created_at);
        // dd($article->created_at->year); // you can do that show only year
        // dd($article->created_at->addDays(8)); // i wanna add 8 days to it
        // dd($article->created_at->addDays(8)->format('Y-m')); // you can also formated
        // dd($article->created_at->addDays(8)->diffForHumans()); // you can also formated fifferent way
        //return $article;
        return view('articles.show', compact('article','comments','replies'));
    }
/* 
     public function like($id) {

        $article = Article::findOrFail($id);
        $article->increment("like_count");
      return back();
  }   */

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //return Auth::user();
        return view('articles.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function condidature($id) {
        $article = Article::findOrFail($id);
        //return Auth::user();
        return view('condidature.sendCondidature', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postcondidature($id, Request $request)
    {
       $article = Article::findOrFail($id);

     //   $this->validate($request, [
     //     'file' => 'required|mimes:pdf,doc,docx|max:2048',
     // ]);

       $fileName = time().'.'.$request->file->extension();   

       $request->file->move(public_path('uploads'), $fileName);  


       // $request['docs'] =$fileName;
       // $request['users_id'] = Auth::id();
       // $request['offre_id'] = $id;
       // $request['title'] = $request->title;
       // $request['body'] = nl2br($request->body);
       //  //     $request['vector'] = $chemin.'/'.$nom;
       // Condidature::create($request->all());

       $files = $request->file('file');

       \Mail::send('email.test', ['name' => Auth::user()->username], function($message){
        $message->to('temimi.muhamed@gmail.com', 'test mail')
                ->from(Auth::user()->email)
                ->subject('test envoi email via laravel');
        $message->attach($files->getRealPath(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getMimeType()));

    });

          //   $vector->save();
             //Session::flash('flash_message', 'Article has been created!');
       flash()->success('Offre ajouté avec succés!');

       return redirect('offres');

        // $comments = Comment::where('article_id',$id)->get();
        // $replies = Reply::all();

        //dd($article->published_at);
        //dd($article->created_at);
        // dd($article->created_at->year); // you can do that show only year
        // dd($article->created_at->addDays(8)); // i wanna add 8 days to it
        // dd($article->created_at->addDays(8)->format('Y-m')); // you can also formated
        // dd($article->created_at->addDays(8)->diffForHumans()); // you can also formated fifferent way
        //return $article;
       return view('articles.show', compact('article','comments','replies'));

       return back()->with('success','You have successfully upload file.')->with('file',$fileName);

   }




    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ArticleRequest $request) {

        /*
          $input = Request::all();
          $input['published_at'] = Carbon::now();
          $input['users_id'] = Auth::id();
          Article::create($input);
         */
    /*    $vector = $request->file('vector');
        
            $chemin = config('images.path');
            $extension = $vector->getClientOriginalExtension();
            do {
                $nom = str_random(10) . '.' . $extension;
            } while(file_exists($chemin . '/' . $nom));

            if($vector->move($chemin, $nom)) {
                session(['urlImage'=> $chemin . '/' . $nom]);
      */          
                $files = $request->file('vector');
              // Making counting of uploaded images
                $file_count = count($files);
              // start count how many uploaded
                $uploadcount = 0;
                $listImages ="";
                foreach ($files as $file) {
             // Get filename with extension
                    $filenameWithExt = $file->getClientOriginalName();

          // Get just the filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          // Get extension
                    $extension = $file->getClientOriginalExtension();

          // Create new filename
                    $filenameToStore = $filename.'_'.time().'.'.$extension;

          // Uplaod image
                    $path= $file->storeAs('public/articles_images', $filenameToStore);


                    $listImages = $listImages . "/" .$filenameToStore;

                }

                $request['picture'] = $listImages;
                $request['users_id'] = Auth::id();
                $request['body'] = nl2br($request->body);
        //     $request['vector'] = $chemin.'/'.$nom;
                Article::create($request->all());

          //   $vector->save();
             //Session::flash('flash_message', 'Article has been created!');
                flash()->success('Offre ajouté avec succés!');

                return redirect('offres');


            }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $article = Article::findOrFail($id);
        // return redirect('modif_offre')->with('article');
        return view('EspaceEntreprise.editOffre', compact('article'));
        // return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\ArticleRequest $request) {
        $article = Article::findOrFail($id);

        if(isset($request['picture'])) {
            // Get filename with extension
          $filenameWithExt = $request->file('vector')->getClientOriginalName();

          // Get just the filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

          // Get extension
          $extension = $request->file('vector')->getClientOriginalExtension();

          // Create new filename
          $filenameToStore = $filename.'_'.time().'.'.$extension;

          // Uplaod image
          $path= $request->file('vector')->storeAs('public/articles_images', $filenameToStore);


          $request['picture'] = $filenameToStore;

          $article->update($request->all());

      }
      else {
        $request['picture'] = $article->picture;
        $article->update($request->all());
    }



    flash()->success('Offre est modifié avec succés!');
    // return redirect('articles');
    return redirect('offres');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        
        flash()->success('Offre supprimé !');
        return redirect('offres');
        // $articles = Article::where('users_id',Auth::id())->latest('created_at')->paginate(8);

        // return view('EspaceEntreprise.offresList', compact('articles'));
    }


    public function result(Request $request){

        $result=Article::where('title', 'LIKE', "%{$request->input('quer
            y')}%")->get();
        return response()->json($result);
    }

}
