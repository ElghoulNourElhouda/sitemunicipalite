@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-8 col-md-offset-2" style="background: #fff; padding-top: 3%; padding-bottom: 3%">
			<legend class="text text-primary"><center> Modifier : <b>{{ $offre->work }}</b> </center></legend>

			@include('articles.errors')

			{!! Form::model($offre, ['method' => 'PATCH','files' => true, 'action' => ['OffreController@update', $offre->id]]) !!}
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
					{!! Form::submit('Enregistrer !', ['class' => 'btn btn-primary']) !!}
				</div>

				{!! Form::close() !!}


			</div>

		</div>
	</div>
	@endsection

