@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background: #fff; margin-top: 2%">
        <div class="col-md-12">
            
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
                            <a href="{{ url('/offres', $offre->id) }}" class="btn btn-info btn-xs" style="width: 80px" role="button"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> afficher</a>
                        </td>
                        <td width="25px">
                            <a href='{{ url("/offres/$offre->id/destroy") }}' class="btn btn-danger btn-xs" onclick="return confirm('Voulez vraiment supprimer \" {!! $offre->work !!} \"  ? ')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Supprimer</a>
                        </td>
                        <td width="25px">
                            @if($offre->blocked)
                            <a href="{{ url("blockOffre/$offre->id")}}" class="btn btn-warning btn-xs" style="width: 80px" role="button"> <span class="glyphicon glyphicon-check" aria-hidden="true"></span> débloquer</a>

                            @else
                            <a href="{{ url("blockOffre/$offre->id")}}" class="btn btn-success btn-xs" style="width: 70px" role="button"> <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> bloquer</a>
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

