
@if ($article->liking)

    @if( App\Like::where('users_id',Auth::id())->where('article_id',$article->id)->count())
      @if( App\Like::where('article_id',$article->id)->count() >  1 )
        <button type="submit" class="btn btn-link pull-left" disabled><span class="fa fa-thumbs-up"  style="color: dodgerblue"></span> You,{{ $likes = App\Like::where('article_id',$article->id)->count()-1 }} autres like this</button>
      @else
        <button type="submit" class="btn btn-link pull-left" disabled><span class="fa fa-thumbs-up"  style="color: dodgerblue"></span> You liked this <?php $like = App\Like::where('article_id',$article->id)->first(); ?>{{ $like->created_at->DiffForHumans() }} </button>
      @endif

    @elseif ( App\Like::where('article_id',$article->id)->count())

      {{ Form::open(array('url' => 'like_task/' . $article->id)) }}
         {{ csrf_field() }}
        <button type="submit" class="btn btn-default btn-sm pull-left"><span class="fa fa-thumbs-up"></span> {{ $likes = App\Like::where('article_id',$article->id)->count() }}</button>
      {{ Form::close() }}

    @else

      {{ Form::open(array('url' => 'like_task/' . $article->id)) }}
        <button type="submit" class="btn btn-default btn-sm pull-left"><span class="fa fa-thumbs-up"></span> Like</button>
      {{ Form::close() }}

    @endif

@else

    <button class="btn btn-default btn-sm pull-left" onclick="return alert('Ooups ;-) ! \n Cannot like this article, liking is blocked by admin');"><span class="fa fa-thumbs-up " style="color: red"></span></button> 

@endif