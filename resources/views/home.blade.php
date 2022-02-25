@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <!--   <div class="panel-heading">Dashboard <small>( under construction... ) </small></div>
                
                    <b><p id="demo" align="center"></p> </b>


                <div class="panel-body" style="font-family: Prestige Elite Std">
                 <?php $user = App\User::findOrfail(auth()->id()); ?>
                    <p> Welcome {{ $user->username }}, You are <b>logged in</b> ...</p><br>
                    <p>Your IP adresse :<strong> {{ $larinfo['client']['ip']}} </strong>
                    <br>
                    <p>Laravel version is : <strong>{{ $curent_version }}</strong></p>
                    <br>

                    <p>You are Currently connect through <strong> @if ( Request::ip() == '127.0.0.1' ) Localhost (127.0.0.1)  @else {{ Request::ip() }} @endif </strong></p> 
                    <br><br>

                    <h2>Current Year : {{ \App\Helpers\Utils::getDate() }}</h2><small>(from Custom Helpers)</small>
                    
                </div> -->
            </div>
        </div>
    <!--    <div align="center">
            
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6856631.455787833!2d6.073590626971719!3d32.951944598147215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1254d62866735147%3A0xf085df215e783c40!2sMedinine!5e0!3m2!1sen!2stn!4v1535028906970" width="90%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>   -->

    </div>
</div>


<!-- countdown script -->
<!-- 
<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 2, 2019 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s "+"<br><small>until get her first year from her starting-developing-day ^_^'</small>";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script> -->



@endsection
