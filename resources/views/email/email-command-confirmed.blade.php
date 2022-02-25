<!DOCTYPE html>

<html lang="fr">

  <head>

    <meta charset="utf-8">

  </head>

  <body>

  <div style="width:100%" align="center">
   <a class="navbar-brand" href="http://localhost/SMS/public/accueil"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpcPu83-MF9JtTFAbVTlQh22lweRZFhIu-y1Al5l3gSQqJz-2V9w" alt="" />@include('time/heure')</a>
      <h2><b style="color:orange"> SMS_Hub </b> : Notification pour la preuve de paiement </h2></div>
   <hr>
    <p><h4>Votre preuve de paiement pour la commande <u style="color: blue"><b> N° {{ $command }} </b></u> est confirmé par l'administrateur.<br/><b> {{ $solde + $bonus }}DT </b> sont ajoutés à votre compte  </h4></p>
<hr>

  </body>

</html>
