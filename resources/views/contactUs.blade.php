@extends('layouts.app')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">

  body{
    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
  }
  .contact-form{
    background: #fff;
    margin-top: 5%;
    margin-bottom: 5%;
    width: 60%;
  }
  .contact-form .form-control{
    border-radius:1rem;
  }
  .contact-image{
    text-align: center;
  }
  .contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
  }
  .contact-form form{
    padding: 10%;
  }
  .contact-form form .row{
    margin-bottom: -7%;
  }
  .contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
  }
  .contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
  }
  .btnContactSubmit
  {
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
  }

</style>


@section('content')
<div class="container">
  <div class="row">
    <div class="container contact-form">
      <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
      </div>
      {!! Form::open(['url' => 'contact']) !!}
      <h3>Contactez-nous</h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
           <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">

            @if (!Auth::guest())

            <?php $usr = \App\User::findOrFail(auth()->id()); ?>

            {!! Form::text('username', $usr->username , ['class' => 'form-control', 'placeholder' => 'prenom']) !!}

            @else

            {!! Form::text('username', null , ['class' => 'form-control', 'placeholder' => 'prénom']) !!}

            @endif

            {!! $errors->first('username', '<small class="help-block">:message</small>') !!}
          </div>
        </div>
        <div class="form-group">
          <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">

            @if (!Auth::guest())

            {!! Form::email('email', $usr->email, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}

            @else

            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'adresse email']) !!}

            @endif

            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

          </div>
        </div>
        <div class="form-group">
         <div class="form-group {!! $errors->has('subject') ? 'has-error' : '' !!}">

          {!! Form::text('subject', null , ['class' => 'form-control', 'placeholder' => 'sujet']) !!}

          {!! $errors->first('subject', '<small class="help-block">:message</small>') !!}

        </div>
      </div>
      <div class="form-group">
        <input type="submit" name="btnSubmit" class="btnContact" value="Envoyer Message" />
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">

          {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'message ']) !!}

          {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}

        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
</div>
</div>
@endsection