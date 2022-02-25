<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/responsive.css" />

    @yield('head')

    <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>

</script>


</head>

<body  style="background: url('images/background/bg11.jpg'); background-color: rgba(0,0,0,0.15) ; padding-top: 60px;" >

    <div class="container" >
        <div class="row">
            <div class="col-xs-12"> @include('layouts.navbar') </div>
        </div>
        <div class="row">
            <div class="col-xs-12"> @include('flash::message') </div>
        </div>
        <div class="row">
            <div class="col-xs-8"> @yield('content') </div>
        </div>

    </div>


       <!--  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
        </div>
    -->

    <!--     end modal     -->


    <!-- contact us modal -->
<!-- 
      <div id="ContactUs" class="modal modal-md" tabindex="-1" role="dialog"  aria-hidden="true" style="padding-top: 60px">
        

                @include('contact')

            </div> -->


        </body>


        <script src=" {{ asset('/js/app.js') }}"></script>

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->

    <script>
        $('div.alert').not('.alert-important').delay(1500).slideUp(300);
        $('#flash-overlay-modal').modal();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>

    @stack('scripts')


    </html>
