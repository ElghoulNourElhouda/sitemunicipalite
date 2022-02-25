    @extends('layouts.app')


    @section('head')
    <style type="text/css">
    	
    	.bloc{
        line-height:34px;
      }

      #BegeniButonlari{
       float:right;
       margin-top:15px;
     }


     #whatever div {
      display: inline;
      margin: 0 1em 0 1em;
      width: 30%;
    }



    body.modal-open #wrap{
      -webkit-filter: blur(7px);
      -moz-filter: blur(15px);
      -o-filter: blur(15px);
      -ms-filter: blur(15px);
      filter: blur(15px);
    }

    .modal-backdrop {background: #f7f7f7;}

    .close {
      font-size: 50px;
      display:block;
    }

    #dash {
      width: 600px;
      height: 93px;
      overflow: hidden;
    }

    #dash p {
      padding: 10px;
      margin: 0;
    }


  </style>

    <script type="text/javascript"> // show only a part of the article body ( read... )
    var p = $('#dash p');
    var ks = $('#dash').height();
    while ($(p).outerHeight() > ks) {
      $(p).text(function(index, text) {
        return text.replace(/\W*\s(\S)*$/, '...');
      });
    }
  </script>
    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"> </script>  -->

    @endsection

    @include('layouts.header') 

    @section('content')

    <div class="container">

      <div class="alert alert-success" style="display:none"></div>

      @if(count($articles))

      <div class="row">
        <div class="col-md-12">

         <?php $i=1; ?>

         @foreach($articles as $article)

         <div class="panel panel-default">
          <div class="panel-body" style="background-image: radial-gradient(73% 147%, #EADFDF 59%, #ECE2DF 100%), radial-gradient(91% 146%, rgba(255,255,255,0.50) 47%, rgba(0,0,0,0.50) 100%); background-blend-mode: screen; padding-top: 3%">
            <div class="media">

              @if(Auth::user()->admin)
              <div class="btn-group" style="float:right">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-cog"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" style="text-align: left;">
                  <li><a href='{{ url("/articles/$article->id/edit") }}'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href='{{ url("/articles/$article->id/destroy") }}' onclick="return confirm('Voulez vraiment supprimer  {!! $article->title !!}    ? ')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete</a></li> 
                    <!--  <li>{{ Form::open(array('url' => 'articles/' . $article->id)) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                              
                              <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> <input type="submit" name="delete" class="btn btn-link" value="Delete" onclick="return confirm('Voulez vraiment supprimer  {!! $article->title !!}    ? ')">
                            {{ Form::close() }} </li> -->
                          </ul>
                        </div>
                        @endif

                        <div class="clearfix"></div>

                        <div class="media-left">
                          @if( $article->picture)
                          <a href="{{ url('/articles', $article->id) }}">
                            <img class="media-object" src="storage/articles_images/{{ $article->picture }}" style="width: 260px; height: 160px;" alt="Kurt">
                          </a>
                          @else
                          <a href="#">
                            <img class="media-object" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Canis_lupus.jpg/260px-Canis_lupus.jpg" alt="Kurt">
                          </a>
                          @endif
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">
                            <a href="{{ url('/articles', $article->id) }}"> {{ $article->title }} </a> </h4>
                            <div id="dash">
                             <p id="limited-text" style="max-width: 90%"> {!! $article->body  !!} </p>
                           </div>
                           <a href="{{ url('articles/'.$article->id) }}" class="btn btn-info btn-xs" style="margin-left: 8px">voir plus...</a>

                           <div class="media-footer">
                            <hr>
                            <span>
                              <?php $user= App\User::where('users_id',$article->users_id)->first(); ?>
                              posté par <i style="color: #000f0f">{{ $user->username }} </i>| @if( $views =App\Views::where('article_id',$article->id)->count() ) <a href="#list_views{{ $i }}" data-toggle="modal" >{{ $views }} views </a> | @endif <small> Posté {{ $article->created_at->diffForHumans() }}.  
                                @if($article->created_at != $article->updated_at)
                                ( Modifié {{ $article->updated_at->diffForHumans() }} )
                              @endif</small> 
                            </span>
                          </div>
                        </div><br>
                      </div>
                    </div>
                  </div>


                  <div class="modal fade" id="list_views{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="container">
                      <div class="row" style="padding-top: 5%">
                        <div class="col-sm-3 col-sm-offset-4" style="background-color: lightyellow">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                          <br><br>
                          @foreach( App\Views::where('article_id',$article->id)->get() as $person)
                          <li> <?php $vwr = App\User::findOrFail($person->users_id); ?>
                          {{ $vwr->username }} {{ $vwr->lastname }} </li><hr>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php $i++ ?>

                  @endforeach
                </div>

              </div>

              <div align="center"> {{ $articles->links() }} </div> 

              @else
              <div class="col-md-6 col-sm-offset-3" align="center">
                <div class="panel panel-info">
                  <div class="panel-heading">Information</div>
                  <div class="panel-body">Aucun offre trouvé !</div>
                </div>
              </div>

              @endif


            </div>


       @endsection