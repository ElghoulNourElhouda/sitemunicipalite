@extends('admin.layout')

@section('content')


<div class="row">


 <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
  <div class="inforide">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background: lightblue">
        <img src="images/img16.png" width="100%">
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
        <h4>Offres</h4>
        <h2>{{ App\Article::All()->count() }}</h2>
      </div>
    </div>
  </div>
</div>


<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
  <div class="inforide">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background: orange">
        <img src="images/img14.png" width="100%">
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
        <h4>Agent</h4>
        <h2>{{ App\User::where('agent','1')->count() }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
  <div class="inforide">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone" style="background: darkgray">
        <img src="images/condidat.png" width="100%">
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
        <h4>Condidat</h4>
        <h2>{{ App\User::where('agent','0')->where('admin','0')->count() }}</h2>
      </div>
    </div>
  </div>
</div>
</div>
<br><br>
<div class="row">

  <div class="col-md-5 col-sm-5 col-xs-12 gutter">

            <!-- <div class="sales">
              <h2>Your Sale</h2>

              <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>Period:</span> Last Year
                </button>
                <div class="dropdown-menu">
                  <a href="#">2012</a>
                  <a href="#">2014</a>
                  <a href="#">2015</a>
                  <a href="#">2016</a>
                </div>
              </div>
            </div> -->
          </div>
          <div class="col-md-7 col-sm-7 col-xs-12 gutter">

            <!-- <div class="sales report">
              <h2>Report</h2>
              <div class="btn-group">
                <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span>Period:</span> Last Year
                </button>
                <div class="dropdown-menu">
                  <a href="#">2012</a>
                  <a href="#">2014</a>
                  <a href="#">2015</a>
                  <a href="#">2016</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        


        @endsection


        <!-- Modal -->
<!-- <div id="add_project" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header login-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add Project</h4>
      </div>
      <div class="modal-body">
        <input type="text" placeholder="Project Title" name="name">
        <input type="text" placeholder="Post of Post" name="mail">
        <input type="text" placeholder="Author" name="passsword">
        <textarea placeholder="Desicrption"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal">Close</button>
        <button type="button" class="add-project" data-dismiss="modal">Save</button>
      </div>
    </div>

  </div> -->
