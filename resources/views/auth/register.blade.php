@extends('layouts.app')
<style type="text/css">
    /*** PANEL INFO ***/
    .with-nav-tabs.panel-info .nav-tabs > li > a,
    .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
    .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
       color: #31708f;
   }
   .with-nav-tabs.panel-info .nav-tabs > .open > a,
   .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
       color: #31708f;
       background-color: #bce8f1;
       border-color: transparent;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.active > a,
   .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
       color: #31708f;
       background-color: #fff;
       border-color: #bce8f1;
       border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #31708f;   
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #bce8f1;
}
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #31708f;
}
</style>
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-8 col-md-offset-2">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active btn btn-info" style="width: 45%;"><a href="#tabCondidature" data-toggle="tab">Condidat</a></li>
                        <li class="btn btn-info" style="width: 45%"><a href="#tabAgent" data-toggle="tab">Agent</a></li>
                    </ul>
                </div>
                <div class="panel-body" style="direction: ltr">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabCondidature">
                            <center><legend class="text text-success" style="align-content: center;"><b>❝ Compte en tant que Condidat ❞</b></legend> </center>
                            <!-- Register as normal user --> 
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Nom <small>(Username) <b style="color: red; font-size: 20px">*</b></small></label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-4 control-label">Prénom</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"  autofocus>

                                        @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Adresse email <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Numéro de téléphone <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Mot de passe <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de passe <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <input type="hidden" name="as" id="as" value="condidat">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Créer compte ✔
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <!-- register as agent -->

                        <div class="tab-pane fade" id="tabAgent">
                            <center><legend class="text text-success" style="align-content: center;"><b>❝ Compte en tant que Agent ❞</b></legend> </center>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('entreprise') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Nom d'entreprise <small><b style="color: red; font-size: 20px">*</b></small></label>

                                    <div class="col-md-6">
                                        <input id="entreprise" type="text" class="form-control" name="entreprise" value="{{ old('entreprise') }}" required autofocus>

                                        @if ($errors->has('entreprise'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('entreprise') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                    <label for="location" class="col-md-4 control-label">adresse entreprise (lieu)<small><b style="color: red; font-size: 20px">*</b></small></label>

                                    <div class="col-md-6">
                                        <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}"  required autofocus>

                                        @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Adresse email <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Numéro téléphone <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Mot de passe <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de passe <b style="color: red; font-size: 20px">*</b></label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <input type="hidden" name="as" id="as" value="agent">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Créer compte ✔
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<!-- 
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">FirstName <small>(Username) <b style="color: red; font-size: 20px">*</b></small></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">LastName</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"  autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <b style="color: red; font-size: 20px">*</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone Number <b style="color: red; font-size: 20px">*</b></label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password <b style="color: red; font-size: 20px">*</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password <b style="color: red; font-size: 20px">*</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
