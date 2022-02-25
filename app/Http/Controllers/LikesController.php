<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Like;
use Carbon\Carbon;
use App\User;
use App\Notifications\LikesNotifications;
use Illuminate\Http\Request; // second way, is to validate in the controller

use Illuminate\Support\Facades\Auth;


class LikesController extends Controller
{
    //

    public function like($id,Request $request) {

        $request['users_id'] = Auth::id();
        $request['article_id'] = $id;
       // $request['title'] = "aaaaaaaa";
      //  Like::create($request->all());  
        Like::create(['users_id' => Auth::id(),
                         'article_id' => $request->article_id,
                     ]);
        $article = Article::findOrFail($id);
        $user = User::findOrFail($article->users_id);
     
         $usr = auth()->user();
        // echo $article->users_id;
        $user->notify(new LikesNotifications($article, $usr));

      /*  Comment::create(['users_id' => Auth::id(),
                         'article_id' => $id,
                         'title' => 'aaaaaaaaaaa',
                         'body' => 'bbbbbbbbbbbbbbbbb' ]); */

      return back();
    }

    public function like2(Request $request) {

        $request['users_id'] = Auth::id();
        $request['article_id'] = $request->article_id;
       // echo $request->article_id;
       // $request['title'] = "aaaaaaaa";
       // Like::create($request->all());  
         $post = Like::create($request->all());
          return response()->json($post);

     /*   Like::create(['users_id' => Auth::id(),
                         'article_id' => $request->article_id,
                     ]);  */

    //  return response()->json(['success'=>'Data is successfully added']);
    }

    public function likes(){
      return view('settings.likes_settings');
    }

    public function remove_all_likes(){
      
      $likes = Like::where('users_id',Auth::id())->get();
      
      if ( $likes->count() > 0 ) {
        
        foreach ($likes as $like) {
          $like->delete();
        }
        
        flash()->success('Great! All your likes has been removed...  ');
      
      } else{
      
        flash()->error('Ooups! there is no likes yet !...  ');
      
      }
      return back();
    }

}
