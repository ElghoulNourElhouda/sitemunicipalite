<!DOCTYPE html>

<html lang="fr">

<head>

  <meta charset="utf-8">

</head>

<body>

  <div style="width:100%" align="center">
   <a class="navbar-brand" href="http://localhost/SMS/public/accueil"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpcPu83-MF9JtTFAbVTlQh22lweRZFhIu-y1Al5l3gSQqJz-2V9w" alt="" />@include('time/heure')</a>
   <h2><b style="color:orange"> Consulting Informatique </b> : Nouveau condidature déposé par {{ $name }}</h2></div>
   <hr>
   <p><h4>La condidature est liée au offre titré " <b style="color: blue"> {{ $offreTitle }} </b> " vient d’être déposée.<br/> Prière de valider la condidature dans les plus brefs délais. </h4></p>
   <hr>

   <ul>

    <li><strong>Nom</strong> :<b style="color:#08123a"><u> {{ $name }} </u></b></li>

    <li><strong>Email</strong> : {!! $emailfrom !!}</li>

    <li><strong>Sujet</strong> : {{ $sujet }}</li>

    <li><strong>Message</strong> :<br></li>
    <i>{!! $content !!}</i>

  </ul>

</body>

</html>
