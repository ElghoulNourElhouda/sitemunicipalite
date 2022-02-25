
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="javascript:history.back()" class="btn">
                       <span class="glyphicon glyphicon-circle-arrow-left"></span> back to  Settings </a></div>

                <div class="panel-body">

					<strong class="text text-info"> Likes list : </strong> 
                    @if ( App\Like::where('users_id',auth::id())->count() > 0 ) <a href="{{ url('/remove_all_likes') }}" class="btn btn-warning btn-xs pull-right">Remove All likes </a> @endif <hr>

					<?php $likes = \App\Like::where('users_id',auth::id())->latest()->get(); ?>

                    @if ($likes->count())
                   
    					@foreach($likes as $like)

    					  <?php $article = \App\Article::where('id',$like->article_id)->first() ?>

                        <li>
                        	you've liked <a href="{{ url('/articles/'.$article->id) }}"> {{ $article -> title }} </a> {{ $like->created_at->DiffForHumans() }} 
                        </li> <hr>

    					@endforeach
                    @else

                        <h5 class="text text-warning" align="center"> Ooups ! You doesn't liked any article yet !... <br>
                        <small> what you want to see here?. try to like some articles </small> </h5>
                    
                    @endif

					   
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection