@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <legend class="text text-primary">Create Article </legend> 

            @include('articles.errors')

            {!! Form::open(['url' => 'articles','files' => true]) !!}

             {{ csrf_field() }}
               
           	 @include('articles.form', ['submitButtonName' => 'Add the Article'])

            {!! Form::close() !!}


        </div>
        
    </div>
</div>
@endsection

