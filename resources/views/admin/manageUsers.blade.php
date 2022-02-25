@extends('admin.layout')

@section('content')
<div class="user-dashboard">
<div class="row">
    <div class="col-md-9">

        @include('includes.flash')


        <h2>liste des {{ $who }} <a href="{{ url('users/create') }}" style="float: right;font-size: 18px;">Ajouter utilisateur</a></h2>

        @if(count($users))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created On</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)    
                <tr>
                    <td><a href="{{ url('/users', $user->users_id) }}">{{ $user->username }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('m/d/Y H:m:s') }}</td>
                    <td>
                        <a href="{{ url("users/$user->users_id/edit")}}" class="btn btn-info" role="button">edit</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'users/' . $user->users_id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
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

