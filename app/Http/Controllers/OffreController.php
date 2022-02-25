<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Offre;
use App\Reply;
use App\Comment;
use App\Condidature;
use Carbon\Carbon;
use App\Gestion\PhotoGestionInterface;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Mail;
use Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Notifications\CondidatNotifications;
use App\Notifications\BlockNotifications;
class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $offres = Offre::latest('created_at')->paginate(4);
      return view('offres.listeOffres', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('offres.form');
   }


   public function self() {

    if (!Auth::guest() && Auth::User()->agent) {
      $offres = Offre::where('users_id',Auth::id())->latest('created_at')->paginate(4);

      return view('offres.listeOffres', compact('offres'));
    }else{
      return back();
    }
  }

  public function gererOffre() {

    if (!Auth::guest() && !Auth::User()->agent && Auth::User()->admin) {
      $offres = Offre::latest('created_at')->get();

      return view('offres.manageOffre', compact('offres'));
    }else{
      return back();
    }
  }



  public function list() {

    $offres = Offre::where('users_id',Auth::id())->latest('created_at')->get();

    return view('settings.articles', compact('offres'));
  }

/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
public function condidature($id) {
  $offre = Offre::findOrFail($id);
        //return Auth::user();
  return view('condidature.sendCondidature', compact('offre'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postcondidature($id, Request $request)
    {

      $this->validate($request,[
        'file' => 'mimes:pdf,png,jpg,jpeg,doc,docx,txt']);

      $offre = Offre::findOrFail($id);

      $data = array('emailfrom' => Auth::user()->email,
        'email' => $request->emailto,
        'name' => Auth::user()->username,
        'offreId' => $offre->id,
        'offreTitle' => $offre->work,
        'sujet' => $request->sujet,
        'content' => $request->message,
        'attachement' => $request->file );

      Mail::send('email.email-command', $data, function($message) use ($data) {
        $message->to($data['email']);
        $message->subject($data['sujet']);
        $message->from($data['emailfrom']);
        $message->attach($data['attachement']->getRealPath(), array( 'as' => $data['attachement']->getClientOriginalName(), 'mime' => $data['attachement']->extension()));
      });

      $user = User::findOrFail($offre->users_id);

      $usr = auth()->user();
      $user->notify(new CondidatNotifications($offre, $usr));

      return redirect('offres/', $offre->id)->with('success','condidature envoyé avec succées.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\OffreRequest $request)
    {
     $file = $request->file('vector');
              // Making counting of uploaded images
               // $file_count = count($files);
              // start count how many uploaded
     $uploadcount = 0;
     $listImages ="";
               // foreach ($files as $file) {
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


                   // $listImages = $listImages . "/" .$filenameToStore;

               // }


     $request['picture'] = $filenameToStore;
     $request['users_id'] = Auth::id();
     $request['description'] = nl2br($request->description);
        //     $request['vector'] = $chemin.'/'.$nom;
     Offre::create($request->all());

          //   $vector->save();
             //Session::flash('flash_message', 'Article has been created!');
     flash()->success('Offre ajouté avec succés!');

     return redirect('/');


   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $offre = Offre::findOrFail($id);
     $comments = Comment::where('article_id',$id)->get();
     $replies = Reply::all();
     return view('offres.affiche', compact('offre','comments','replies'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $offre = Offre::findOrFail($id);
        // return redirect('modif_offre')->with('offre');
     return view('offres.edit', compact('offre'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\OffreRequest $request, $id)
    {
      $offre = Offre::findOrFail($id);

      if(isset($request['vector'])) {
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

        $offre->update($request->all());

      }
      else {
        $request['picture'] = $offre->picture;
        $offre->update($request->all());
      }



      flash()->success('Offre est modifié avec succés!');
    // return redirect('offres');
      return redirect('offres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $offre = Offre::findOrFail($id);
     $offre->delete();

     flash()->success('Offre supprimé !');
     // return redirect('offres');
     return back();
   }



   public function block($id) {
        //dd($id);
    $offre = Offre::findOrFail($id);
    if ($offre->blocked) {
      $offre->blocked = 0;
      Session::flash('flash_message', ' l\'offre de " '. $offre->work .' " débloquer !');
    }else{
      $offre->blocked = 1;
      Session::flash('flash_message', ' l\'offre de " '. $offre->work .' " bloquer !');
    }

    $offre->save();

    $user = User::findOrFail($offre->users_id);
    $usr = auth()->user();
    $user->notify(new BlockNotifications($offre, $usr));


    return back();

  }

  public function readNotification($id, Request $request) {

    DB::table('notifications')->where('id',$id)->update(['read_at' => Carbon::now()]);
    $url = $request['goto'];
    return redirect('/offres/'.$url);
  }

}
