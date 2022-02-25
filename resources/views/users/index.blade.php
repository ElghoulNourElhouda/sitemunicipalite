@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background: #fff; margin-top: 2%">
        <div class="col-md-12">
            
            @include('includes.flash')
            
            
            <h2>List des {{ $who ?? 'utilisateurs' }} <a href="{{ url('users/create') }}" style="float: right;font-size: 18px;"><small class="text text-primary">nouveau utilisateur !</small></a></h2>

            @if(count($users))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nom / prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Créer le</th>
                        <th colspan="3" style="text-align: center;"> Action </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)    
                    <tr>
                        <td>{{ $user->username }}  {!! $user->lastname !!}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at->format('m/d/Y H:m:s') }}</td>
                        <td width="25px">
                            <a href="{{ url("users/$user->users_id/edit")}}" class="btn btn-info" style="width: 80px" role="button">modifier</a>
                        </td>
                        <td width="25px">
                            {{ Form::open(array('url' => 'users/' . $user->users_id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('supprimer', array('class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        </td>
                        <td width="25px">
                            @if($user->blocked)
                            <a href="{{ url("block/$user->users_id")}}" class="btn btn-warning" style="width: 80px" role="button">débloquer</a>

                            @else
                            <a href="{{ url("block/$user->users_id")}}" class="btn btn-warning" style="width: 70px" role="button">bloquer</a>
                            @endif
                        </td>

                    </tr>
                    @endforeach   

                </tbody>
            </table>
            @endif
            


        </div>
    </div>
</div>
@endsection

