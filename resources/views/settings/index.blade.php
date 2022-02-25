

@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings</div>

                    <div class="panel-body">
                       
                        <a href="{{ url('comments') }}" class="btn btn-info btn-xs"> My Comments </a>
                        <small> See / Manage your comments historiques </small><hr>
                        <a href="{{ url('likes') }}" class="btn btn-info btn-xs"> My Likes </a>
                        <small> See / Manage all your latest likes historique.</small><hr>
                        <a href="{{ url('my_articles') }}" class="btn btn-info btn-xs"> My Articles </a>
                        <small> See / Manage all your articles and take a look at your posts.</small>                 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
