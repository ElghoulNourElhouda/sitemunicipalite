
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

					<strong class="text text-info"> My articles list :</strong> <small style="color: gray">( {{ $articles->count() }} articles )</small>
                    @if ( App\Article::where('users_id',auth::id())->count() > 0 ) <a href="{{ url('/destroy_all_articles') }}" class="btn btn-warning btn-xs pull-right">Delete all my articles </a> @endif <hr>

                    @if ( $articles->count() )
                      <ul class="timeline">
					   @foreach($articles as $article)

                        <li>
                    	   <a href="{{ url('/articles/'.$article->id) }}">{{ $article -> title }} </a> 
                           <span class="pull-right" style="background-color: #28282828; padding-left: 5px"> {{ $article->created_at }}    
                            <button class="btn btn-danger btn-xs" style="width: 80px">delete</button></span><br>
                        </li> 


					   @endforeach
                      </ul>
                    @else

                        <h5 class="text text-warning" align="center"> Ooups ! You doesn't have any article yet !... <br>
                        <small> try to post some articles </small> </h5>
                    
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection