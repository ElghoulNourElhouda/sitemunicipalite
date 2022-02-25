@extends('layouts.app');


@section('content')

 
  @if(!empty($message))
<br><br><br><br><br><br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading"><legend><i class="fa fa-refresh fa-spin"></i>    Statut </legend></div>
            <div class="panel-body"> 
             
               <h5> <b><span class="fa fa-exclamation-triangle" style="color: red"></span>       {{ $message }}  <em><a href="{{ url('command') }}"> historique de commandes </a></b> </h5><br/>
               <h3> ou continuer avec la nouvelle commande ci dessous </h3>
             
               <br/><br/>
                <a name="ok" class="btn btn-success btn-sm pull-right" href="{{ url('accueil') }}" style="width: 150px">Continuer</a>
            </div>
        </div>
    </div>

  @endif

@stop