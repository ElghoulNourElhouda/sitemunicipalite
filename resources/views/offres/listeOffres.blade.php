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
      width: 650px;
      height: 50px;
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

    <div class="container" style="padding-top: 3%; align-content: center; ">

      <div class="alert alert-success" style="display:none"></div>

      @if(count($offres))

      <div class="row">
        <div class="col-md-10 col-md-offset-1">

         <?php $i=1; ?>

         @foreach($offres as $offre)

         <?php $user= App\User::where('users_id',$offre->users_id)->first(); ?>

         <div class="panel panel-default">
          <div class="panel-body" style="background-image: radial-gradient(73% 147%, #EADFDF 59%, #ECE2DF 100%), radial-gradient(91% 146%, rgba(255,255,255,0.50) 47%, rgba(0,0,0,0.50) 100%); background-blend-mode: screen; padding-top: 3%">
            <div class="media">

              @if(!Auth::guest() && Auth::user()->agent && Auth::user()->id == $offre->user_id)
              <div class="btn-group" style="float:right">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-cog"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" style="text-align: left;">
                  <li><a href='{{ url("/offres/$offre->id/edit") }}'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modifier</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href='{{ url("/offres/$offre->id/destroy") }}' onclick="return confirm('Voulez vraiment supprimer \" {!! $offre->work !!} \"    ? ')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Supprimer</a></li> 
                    <!--  <li>{{ Form::open(array('url' => 'offres/' . $offre->id)) }}
                              {{ Form::hidden('_method', 'DELETE') }}
                              
                              <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> <input type="submit" name="delete" class="btn btn-link" value="Delete" onclick="return confirm('Voulez vraiment supprimer  {!! $offre->title !!}    ? ')">
                            {{ Form::close() }} </li> -->
                          </ul>
                        </div>
                        @endif

                        <div class="clearfix"></div>

                        <div class="media-left">
                          @if( $offre->picture)
                          <a href="{{ url('/offres', $offre->id) }}">
                            <img class="media-object" src="storage/articles_images/{{ $offre->picture }}" style="width: 260px; height: 160px;" alt="Kurt">
                          </a>
                          @else
                          <a href="#">
                            <img class="media-object" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Canis_lupus.jpg/260px-Canis_lupus.jpg" alt="Kurt">
                          </a>
                          @endif
                        </div>
                        <div class="media-body" style="padding-left: 2%">
                          <legend class="media-heading">
                            <a href="{{ url('/offres', $offre->id) }}"> {{ $offre->work }} </a> </legend>
                            <div >
                              <small>
                                <span class="fa fa-graduation-cap"> {{ $offre->formation }}</span>   
                                <span class="fa fa-check-square-o" style="padding-left: 2%"> | {{ $offre->level }}</span>    
                                <span class="fa fa-map-marker" style="padding-left: 2%"> | {{ $offre->location }}</span>   
                                <span class="fa fa-history" style="padding-left: 2%"> | {{ $offre->created_at->diffForHumans() }} </span>
                              </small>
                            </div>
                            <div id="dash" style="border-top: 2px">
                             <p id="limited-text" style="max-width: 90%"> {!! $offre->description  !!} </p>
                           </div>
                           <a href="{{ url('offres/'.$offre->id) }}" class="btn btn-info btn-xs" style="margin-left: 8px">voir plus...</a>

                           <div class="media-footer">
                            <span> <br>

                              <small>
                                @if ( !Auth::guest() && Auth::user()->agent )
                                Posté {{ $offre->created_at->diffForHumans() }} 

                                @else
                                Posté {{ $offre->created_at->diffForHumans() }} par 
                                <i style="color: #000f0f">{{ $user->username }} </i>
                                @endif 
                                @if($offre->created_at != $offre->updated_at)
                                ( Modifié {{ $offre->updated_at->diffForHumans() }} )
                              @endif</small> 


                              @if( $views =App\Views::where('offre_id',$offre->id)->count() )
                              <small> Vu par {{ $views }}  personnes</small>
                              @endif

                              @if( $condidatures =App\Condidature::where('offre_id',$offre->id)->count() ) 
                              <small> {{ $condidatures }}  condidatures</small>
                              @endif
                            </span>
                          </div>
                        </div><br>
                      </div>
                    </div>
                  </div>

                  <?php $i++ ?>

                  @endforeach
                </div>

              </div>

              <div align="center"> {{ $offres->links() }} </div> 

              @else
              <div class="col-md-6 col-sm-offset-3" align="center">
                <div class="panel panel-info">
                  <div class="panel-heading">Information</div>
                  <div class="panel-body">
                    @if(!Auth::guest() && Auth::User()->agent)
                    Aucun offre trouvé ! <a href="{{ url('nouveauOffre') }}"> Ajouter votre prémier offre ? </a>
                    @else
                    Aucun offre trouvé !
                    @endif
                  </div>
                </div>
              </div>

              @endif


            </div>


            @endsection