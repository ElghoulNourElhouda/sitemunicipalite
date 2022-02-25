@extends('layouts.app')

<style>
    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
    input[type="file"] {
        padding-bottom: 2%;
        display: none;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-offset-2 col-sm-offset-2"  style="background: #fff">
                <legend class="text text-primary"><center>Ajout offre</center> </legend> 

                @include('articles.errors')

                {!! Form::open(['url' => 'offres','files' => true]) !!}

                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('work', 'Emploi :') !!}
                    {!! Form::text('work', null, ['class' => 'form-control', 'id' => 'title']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('level', 'Niveau :') !!}
                    {!! Form::text('level', null, ['class' => 'form-control', 'id' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('etude', 'formation :') !!}
                    {!! Form::text('formation', null, ['class' => 'form-control', 'id' => '']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('location', 'lieu : ') !!}
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Description: ') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10']) !!}
                </div>

                <div class="form-group">
                    <label class="custom-file-upload"> 
                        <input type="file" id="vector" name="vector" multiple class="form-control" accept="svg,tif,gif,png,jpg" onchange="document.getElementById('picture').value=this.value" onload="document.getElementById('image').value=this.value" > Ajouter image </label>    
                        <input type="texte" name="picture" id="picture" class="form-control" disabled > 
                    </div>   

                    <div class="form-group" style="float: right">
                        {!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}


                </div>
        </div>
    </div>
    @endsection
