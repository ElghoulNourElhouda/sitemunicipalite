@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background: #fff ">
            <h2>liste des offres</h2>


            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Emploi</th>
                        <th>Niveau</th>
                        <th>Formation</th>
                        <th>lieu</th>                       
                    </tr>
                </thead>
            </table>


        </div>
    </div>
</div>
@endsection


@push('scripts')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        // $(function () {
        //     $('#datatable0').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: '{{ url("datatable/ajaxdata") }}'
        //     });
        // });
        
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("datatable/ajaxdata") }}',
            columns: [
                {data: 0, name: 'id'},
                {data: 1, name: 'work', searchable: true},
                {data: 2, name: 'level', searchable: true},
                {data: 3, name: 'formation', searchable: true},
                {data: 4, name: 'lieu', searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
        
    });
</script>
@endpush