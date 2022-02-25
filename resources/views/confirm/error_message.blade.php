@extends('layouts.app');


@section('content')

   <br><br><br>
   @if(!empty($message))
    <div class="col-sm-offset-3 col-sm-6">
        <div class="alert alert-danger" role="alert">
            <div class="panel-heading"><legend><i class="fa fa-refresh fa-spin"></i>    Statut </legend></div>
            <div class="panel-body"> 
             
               <h5> <b> {{ $message }}  <span class="glyphicon glyphicon-exclamation-sign" style="color: red"></span></b> </h5>
             
               <br/><br/>
                <a name="ok" class="btn btn-success btn-sm pull-right" href="{{ url('accueil') }}" style="width: 150px">Continuer</a>
            </div>
        </div>
    </div>
  @endif
 
  @if(!empty($warning))
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading"><legend><i class="fa fa-refresh fa-spin"></i>    Status </legend></div>
            <div class="panel-body"> 
             
               <h5> <b><span class="fa fa-exclamation-triangle" style="color: red"></span>        {{ $warning }}  </b> </h5>
             
               <br/><br/>
                <a name="ok" class="btn btn-success btn-sm pull-right" href="{{ url('accueil') }}" style="width: 150px">Continuer</a>
            </div>
        </div>
    </div>
  @endif
@stop