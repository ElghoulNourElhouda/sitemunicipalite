@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row"> -->

<div class="container" style="background-image: url('../storage/articles_images/{{ $offre->picture }}'); background-size: cover; background-position: center; background-color: #E6E6FA">
    <div class="row" style="background-color: rgba(240, 255, 240, 0.6)">

        <div class="col-md-8 col-md-offset-2" style="background-color: rgba(240, 255, 240, 0.8); margin-bottom: 10px;">
         <div id="ToPrint" style="padding-top: 10px;">
            
            <?php $user= App\User::where('users_id',$offre->users_id)->first(); ?>
            
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="uploads/{{ Session::get('file') }}">

        @endif

  

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>erreur !</strong> un probleme est recontré avec les champs.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="col-md-8 col-md-offset-2">
            <legend class="text text-primary">Envoyer condidature</legend> 

            @include('articles.errors')

            {!! Form::open(['url' => 'postCondidature/' . $offre->id,'files' => true]) !!}

             {{ csrf_field() }}
               
           	 @include('condidature.form', ['submitButtonName' => 'Envoyer !'])

             <input type="hidden" name="nbOffre" id="nbOffre" value="{{ $offre->id }}">
             
             <input type="hidden" name="emailto" id="emailto" value="{{ $user->email }}" >

            {!! Form::close() !!}


        </div>
        
    </div>
</div>
</div>
</div>
@endsection

