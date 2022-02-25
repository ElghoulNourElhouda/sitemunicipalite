<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use App\User;
use App\Comment;
use App\Reply;
use App\Notifications\CommentORReply;
use App\Notifications\RepliesNotifications;
use Carbon\Carbon;
// use Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; // second way, is to validate in the controller
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //

     public function comment($id, Requests\CommentRequest $request) {

        $article = Article::findOrFail($id);
        // $article->increment("comments_count");
        if($article){
          $request['users_id'] = Auth::id();
          $request['article_id'] = $id;
         // $request['title'] = "aaaaaaaa";
          Comment::create($request->all()); 
        }

        $user = User::findOrFail($article->users_id);
        $usr = auth()->user();
      //  echo $article->users_id;
        $user->notify(new CommentORReply($article, $usr));
      /*  Comment::create(['users_id' => Auth::id(),
                         'article_id' => $id,
                         'title' => 'aaaaaaaaaaa',
                         'body' => 'bbbbbbbbbbbbbbbbb' ]); */

      return back();
    }


    public function reply($id, Requests\ReplyRequest $request) {

        $comment = Comment::findOrFail($id);
      //  $comment->increment("replies_count");
        if($comment)
        {
          $request['users_id'] = Auth::id();
          $request['comment_id'] = $id;
          Reply::create($request->all());
        }

        $user = User::findOrFail($comment->users_id);
        $usr = auth()->user();
      //  echo $article->users_id;
        $user->notify(new RepliesNotifications($comment, $usr));


      return back();
    }

    public function update($id, Requests\ArticleRequest $request) {
        $article = Article::findOrFail($id);

        if(!empty($request['picture'])) {
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
         
        
        
        flash()->success('Article has been updated!');
        return redirect('articles');
    }


    public function readNotification($id, Request $request) {

        DB::table('notifications')->where('id',$id)->update(['read_at' => Carbon::now()]);
      $url = $request['goto'];
      return redirect('/articles/'.$url);
    }

     public function destroy($id) {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        
        flash()->success('Comment has been deleted!');
      return back();
    }

    public function comments (){
      return view('settings.comments_settings');
    }

    public function destroy_all(){
      $comments = Comment::where('users_id', auth()->id())->get();
      if ( $comments->count() > 0 ) {
        
        foreach ($comments as $comment) {
          $comment->delete();
        }
        
        flash()->success('All your comments has been deleted...  ');
      
      } else{
      
        flash()->error('there is no comments yet !...  ');
      
      }
      return back();
    }


}
