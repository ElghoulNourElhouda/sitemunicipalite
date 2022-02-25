@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Utilisateur : <strong>{{ $user->username }}</strong> 
                    <a href="{{ url('users') }}" style="float: right;"> Liste utilisateurs </a>
                    <span style="float: right;margin: 0px 10px;">|</span>
                    <a href="{{ url("users/$user->users_id/edit")}}" style="float: right">Modifier</a>
                </div>
                <div class="panel-body">

                    <p>Nom  : <strong>{{ $user->username }}</strong></p>
                    <p>Adresse email : <strong>{{ $user->email }}</strong></p>
                    <p>Créer le : <strong>{{ $user->created_at->format('m/d/Y H:m:s') }}</strong></p>
                 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
