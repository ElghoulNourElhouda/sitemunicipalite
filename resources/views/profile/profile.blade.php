@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier profile </div>

                <div class="panel-body">
                   
                    <!--<form class="form-horizontal" role="form" method="PATCH" action="{{ url('/users', $user->users_id) }}">-->
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => url('/profile'), 'class' => 'form-horizontal']) !!}
                   
                        {{ csrf_field() }}

                        <!-- if condidat -->

                        @if ($user->admin == 0 && $user->agent == 0)

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nom <small>(nom utilisateur)</small> <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">prénom 
                                <!-- <b style="color: red; font-size: 16px">*</b> -->
                            </label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse email <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Numéro téléphone <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">

                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        @endif

                        <!-- if agent -->

                        @if ($user->admin == 0 && $user->agent == 1)

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Nom d'entreprise <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">adresse entreprise (lieu) <small><b style="color: red; font-size: 16px">*</b></small></label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location', $user->location) }}" autofocus>

                                @if ($errors->has('location'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse email <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Numéro téléphone <b style="color: red; font-size: 16px">*</b></label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">

                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        @endif


                        <!-- <div class="col-md-6">
                            <hr style="width: 60%">
                            <p style="padding-left: 30%"> 
                            (<b style="color: red; font-size: 16px">*</b>) Obligatoire </p>
                        </div> -->
                       
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

