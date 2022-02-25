@extends('layout.app')

@section('content')
<div class="user-dashboard">
<div class="row">
    <div class="col-md-9">

        @include('includes.flash')


        <h2>liste des offres</h2>

        @if(count($offres))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Emploi</th>
                    <th>Formation</th>
                    <th>Niveau</th>
                    <th>Lieu</th>
                    <th colspan="3" >Action</th>
                </tr>
            </thead>
            <tbody>

                    @foreach($offres as $offre)    
                    <tr>
                        <td>{{ $offre->work }}</td>
                        <td>{{ $offre->formation }}</td>
                        <td>{{ $offre->level }}</td>
                        <td>{{ $offre->location }}</td>
                        <td width="25px">
                            <a href="{{ url('/offres', $offre->id) }}" class="btn btn-info" style="width: 80px" role="button">afficher</a>
                        </td>
                        <td width="25px">
                            <a href='{{ url("/offres/$offre->id/destroy") }}' class="btn btn-danger btn-xs" onclick="return confirm('Voulez vraiment supprimer  {!! $offre->title !!}    ? ')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Supprimer</a>
                        </td>
                        <td width="25px">
                            @if($offre->blocked)
                            <a href="{{ url("blockOffre/$offre->id")}}" class="btn btn-warning" style="width: 80px" role="button">débloquer</a>

                            @else
                            <a href="{{ url("blockOffre/$offre->id")}}" class="btn btn-warning" style="width: 70px" role="button">bloquer</a>
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

