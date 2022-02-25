<!-- 
<link rel="stylesheet" type="text/css" href="css/customdesign.css">
<header id="page-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <video autoplay muted loop id="myVideo">
                  <source src="rain.mp4" type="video/mp4">
                </video>

                <img class="img-responsive" src="images/img2.png" alt="" width="155px" height="155px">
                <div class="intro-text">
                    <span class="name">Consulting informatique</span>
                    <hr class="star-light">
                    <p class="skills">Toutes les offres d'emploi Consultant Informatique</p>
                    <p class="skills">Moteur de recherche d'emplois.</p>
                </div>
            </div>
        </div>
    </div>
</header>
 -->
<style type="text/css">
    .name {
    display: block;
    text-transform: uppercase;
    font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 2em;
    font-weight: 700;
}

    header {
  position: relative;
  background-color: black;
  height: 55vh;
  min-height: 25rem;
  width: 100%;
  overflow: hidden;
}

header video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);
}

header .container {
  position: relative;
  z-index: 2;
}

header .overlay {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: black;
  opacity: 0.5;
  z-index: 1;
}

@media (pointer: coarse) and (hover: none) {
  header {
    background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
  }
  header video {
    display: none;
  }
}

</style>

<header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="videos/vd003.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
     <center><img class="img-responsive" src="images/img2.png" alt="" width="155px" height="155px" style="margin-top: 5%"></center>
      <div class="w-100 text-white">
        <h1 class="display-3 name" style="color: orange">Consulting informatique</h1>
        <p class="lead mb-0" style="color: white">
            Toutes les offres d'emploi Consultant Informatique.
                    <br><small>Moteur de recherche d'emplois.</small></p>
        
      </div>
    </div>
  </div>
</header>


<!-- <script type="text/javascript">
    $(document).ready(function () {

    $(".player").mb_YTPlayer();

});
</script>

<style type="text/css">
    .video-section .pattern-overlay {
background-color: rgba(71, 71, 71, 0.59);
padding: 110px 0 32px;
min-height: 496px; 
/* Incase of overlay problems just increase the min-height*/
}
.video-section h1, .video-section h3{
text-align:center;
color:#fff;
}
.video-section h1{
font-size:110px;
font-family: 'Buenard', serif;
font-weight:bold;
text-transform: uppercase;
margin: 40px auto 0px;
text-shadow: 1px 1px 1px #000;
-webkit-text-shadow: 1px 1px 1px #000;
-moz-text-shadow: 1px 1px 1px #000;
}
.video-section h3{
font-size: 25px;
font-weight:lighter;
margin: 0px auto 15px;
}
.video-section .buttonBar{display:none;}
.player {font-size: 1px;}
</style>

 <section class="content-section video-section">
  <div class="pattern-overlay">
  <a id="bgndVideo" class="player" data-property="{video:'videos/vd001.mp4',containment:'.video-section', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <h1>Full Width Video</h1>  
        <h3>Enjoy Adding Full Screen Videos to your Page Sections</h3>
       </div>
      </div>
    </div>
  </div>
</section> -->
