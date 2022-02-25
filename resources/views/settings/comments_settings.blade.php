
@extends('layouts.app')

@section('content')

<style type="text/css">
    ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="javascript:history.back()" class="btn">
                       <span class="glyphicon glyphicon-circle-arrow-left"></span> back to  Settings </a></div>

                <div class="panel-body">

					<strong class="text text-info"> Comments list :</strong>
                    @if ( App\Comment::where('users_id',auth::id())->count() > 0 ) <a href="{{ url('/destroy_all_comments') }}" class="btn btn-warning btn-xs pull-right">Delete All comments </a> @endif <hr>

					<?php
					    $comments = \App\Comment::where('users_id',auth::id())->latest()->get();
					?>

                    @if ( $comments->count() )
                      <ul class="timeline">
					   @foreach($comments as $comment)

                        <?php $article = \App\Article::where('id',$comment->article_id)->first() ?>

                        <li>
                    	   you've commented <a href="{{ url('/articles/'.$article->id) }}">{{ $article -> title }} </a> 
                           <a href="#" class="pull-right">{{ $comment->created_at }} </a>
                        </li> 


					   @endforeach
                      </ul>
                    @else

                        <h5 class="text text-warning" align="center"> Ooups ! You doesn't commented any article yet !... <br>
                        <small> what you want to see here?. try to comment some articles </small> </h5>
                    
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection