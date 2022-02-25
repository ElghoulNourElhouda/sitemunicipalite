<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript" src="date_heure.js"></script>
<script type="text/javascript">

	function date_heure(id)
{
date = new Date;
annee = date.getFullYear();
moi = date.getMonth();
mois = new Array('January', 'February', 'March','April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
j = date.getDate();
jour = date.getDay();
jours = new Array('Sun.', 'Mon.', 'Tues.', 'Wed.', 'Thu.', 'Fri.', 'Sat.');
h = date.getHours();
if(h<10)
{
h = "0"+h;
}
m = date.getMinutes();
if(m<10)
{
m = "0"+m;
}
s = date.getSeconds();
if(s<10)
{
s = "0"+s;
}
resultat = ' '+jours[jour]+' '+j+' '+mois[moi]+' '+annee+' / '+h+':'+m+':'+s;
document.getElementById(id).innerHTML = resultat;
setTimeout('date_heure("'+id+'");','1000');
return true;
}

</script>
</head>
<body>


<p><span class="glyphicon glyphicon-calendar"></span> 
	<span id="date_heure"></span>
	<script type="text/javascript"> window.onload = date_heure('date_heure');</script>
</p>
</body>
</html>
