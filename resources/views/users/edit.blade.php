@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 8%">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading"><strong> Modification Utilisateur</strong> 
                    <a href="{{ url('users') }}" style="float: right;"> Liste utilisateurs</a>
                    <span style="float: right;margin: 0px 10px;">|</span>
                    <a href="{{ url("users/$user->users_id/reset_password") }}" style="float: right;">Modifier mot de passe </a> 
                </div>
                <div class="panel-body" style="background: #A5000000">

                    @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                     
                    <!--<form class="form-horizontal" role="form" method="PATCH" action="{{ url('/users', $user->users_id) }}">-->
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => url('/users', $user->users_id), 'class' => 'form-horizontal']) !!}
                   
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nom utilisateur</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Addresse email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier !
                                </button>
                            </div>
                        </div>
                        
                    <!--</form>-->
                    {!! Form::close() !!}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

