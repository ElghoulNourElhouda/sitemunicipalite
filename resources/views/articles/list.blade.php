@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Articles List <a href="{{ url('articles/create') }}" style="float: right;font-size: 18px;">Add Task</a></h2>


            @if(count($articles))

               <?php $i=1; ?>

                 @foreach($articles as $article)    

                    <div class="col-md-11 col-md-offset-2" style="border: solid 1px; padding-bottom: 15px; margin-bottom: 10px; padding-top: 15px;">
                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="#vect" data-toggle="modal"><img class=" img-fluid" src="images/123.png" alt="card image" style=" width: 150px ; height: 150px"></a>
                                    <h4 class="card-title">{!! $i !!} - <a href="{{ url('/articles', $article->id) }}"> {{ $article->title }}</a> </h4>
                                    
                                    <details class="card-text" style="width:95%; word-wrap:break-word;">
                                      <summary class="pull-left" >Show details</summary> <br><br>
                                    	<small>
                                    	{{ $article->body }}
                                        </small>
                                    </details>

                                    <div class="form-group " id="publish">
                                      <small class="text text-primary"  style="align-items: left; font-family: Prestige Elite Std">
                                        <u> Published on :</u>  {{ $article->created_at }} 
                                      </small> <br>
                                    </div>
                                      <div class="form-group">

                                        {{ Form::open(array('url' => 'like_task/' . $article->id)) }}
                                          <input type="submit" class="btn btn-primary btn-sm pull-left" value="Like" name="like" id="like">
                                        {{ Form::close() }}
                                      
                                        <button class="btn btn-default btn-sm pull-right" onclick="document.getElementById('commentaire{!! $i !!}').style.display= 'block';" ondblclick="document.getElementById('commentaire{!! $i !!}').style.display= 'none';">Comment</button>
                                          
                                       </div> <br>
                                      
                                      {{ Form::open(array('url' => 'like_task/' . $article->id)) }}

                                       <div id="commentaire{!! $i !!}" class="form-group" style="display: none">
                                        
                                          <textarea oninput="document.getElementById('apply {!! $i !!}');" style="height: 100px; width: 100%" placeholder="tapez un commentaire..." name="body" id="body"></textarea>
                                          <input type="submit" id="apply {!! $i !!}" value="Apply" class="btn btn-info" name="comment">
                                       </div>
                                       {{ Form::close() }}

                                       <span class="pull-left">
                                          <small>{{ $article->comments_count }} commentaires </small>
                                       </span>



                                      @if (Auth::user()->admin)
                                    
                                        <div align="center">
                                        <table width="100%">
                                        <tr><td>
                                        <a href="{{ url("articles/$article->id/edit")}}" class="btn btn-info btn-block" role="button"> edit</a></td>
                                        <td>
                                        {{ Form::open(array('url' => 'articles/' . $article->id)) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <!-- {{ Form::submit('delete', array('class' => 'btn btn-danger btn-block')) }}  -->
                                        <input type="submit" name="delete" value="delete !" class="btn btn-danger btn-block" onclick="return confirm('Would you really delete this article : {!! $article->title !!}  ? ')">
                                        {{ Form::close() }}
                                        </td></tr></table>
                                        </div>
                                        @endif

                                 <?php $i++ ?>
                                </div>
                               </div>
                       </div>

                @endforeach  
            @endif
        </div>
    </div>
</div>


<div id="vect" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> Fermer (x)</button> <h3 class="pull-left"> Vector </h3>
              </div>
              <div class="modal-body form-group" align="center">
               <img class=" img-fluid" src="images/123.png" alt="card image" >
              </div>
         </div>
       </div>
</div> 


@endsection

