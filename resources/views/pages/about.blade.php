@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 5%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">A propos</div>

                <div class="panel-body">
                    {!! App\About::latest('created_at')->first()->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
