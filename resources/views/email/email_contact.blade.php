<!DOCTYPE html>

<html lang="fr">

  <head>

    <meta charset="utf-8">

  </head>

  <body>

  <div style="width:100%" align="center">
   <a class="navbar-brand" href="http://localhost/SMS/public/accueil"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpcPu83-MF9JtTFAbVTlQh22lweRZFhIu-y1Al5l3gSQqJz-2V9w" alt="" />@include('time/heure')</a>
      <h2><b style="color:orange"> Consulting Informatique </b> : prise de contact </h2></div>
   <hr>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
<hr>
    <ul>

      <li><strong>Nom</strong> :<b style="color:#08123a"><u> {{ $username }} </u></b></li>

      <li><strong>Email</strong> : {{ $email }}</li>

      <li><strong>Sujet</strong> : {{ $subject }}</li>

      <li><strong>Message</strong> :<br></li>
       <i>{{ $texte }}</i>

    </ul>

  </body>

</html>
