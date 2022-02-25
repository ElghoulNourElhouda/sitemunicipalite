@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">A propos</div>
				<div class="panel-body">
					{!! Form::open(['url' => 'AddAbout']) !!}

					{{ csrf_field() }}

					<div class="form-group">
						<textarea id="description" name="description" class="form-control" rows="15"> {!! App\About::latest('created_at')->first()->description !!}
						</textarea>
					</div>
					<div class="form-group" style="float: right">
						{!! Form::submit('Ajouter', ['class' => 'btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
