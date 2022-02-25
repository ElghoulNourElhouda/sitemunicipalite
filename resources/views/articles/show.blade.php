@extends('layouts.app')

@section('content')

@if (App\Views::where('users_id',auth()->id())->where('article_id',$article->id)->count() == 0)
@if($article->users_id != auth()->id())
<?php  App\Views::create(['users_id' => auth()->id(), 'article_id' => $article->id]); ?>
@endif
@endif

<script type="text/javascript">
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('ToPrint').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>


<div class="container" style="background-image: url('../storage/articles_images/{{ $article->picture }}'); background-size: cover; background-position: center; background-color: #E6E6FA">
    <div class="row" style="background-color: rgba(240, 255, 240, 0.6)">

        <div class="col-md-8 col-md-offset-2" style="background-color: rgba(240, 255, 240, 0.8); margin-bottom: 10px;">
           <div id="ToPrint" style="padding-top: 10px;">
            <p align="center">
                @if($article->picture)

                <img class="img-responsive img-fluid" id="myImg" src="../storage/articles_images/{{ $article->picture }} " alt="Article image" style="border: solid #E6E6FA 1px; max-width: 50%; max-height: 25%;" >

                <!--  <a class="btn btn-link" data-toggle="modal" href="../storage/articles_images/{{ $article->picture }}" download> download image</a> -->
                @else
                <img class="img-responsive img-fluid" id="myImg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Canis_lupus.jpg/260px-Canis_lupus.jpg" alt="card image" style="max-width: 30%; max-height: 25%;" > 
                @endif
            </p>
            <!-- button to return back  -->

            @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

            <img src="uploads/{{ Session::get('file') }}">

            @endif



            @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif

            <!-- / button -->
            <hr><br>
            <h2>{{$article->title}} 
                <!-- <a href="{{ url('articles') }}" style="float: right;font-size: 18px;">Articles List</a> --> </h2> 

                <article>
                  {!! $article->body !!}
              </article>
          </div>
          <div id="editor"></div><br><br>
          <!--   <button id="cmd">generate PDF</button> -->
          @if (!Auth::user()->agent && !Auth::user()->admin)
          <a href="{{ url('condidature/'.$article->id) }}" class="btn btn-primary btn-sm"> Diposer documents </a>
          @endif
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> -->

          <hr><br>
          <div class="form-group">
            <a href="javascript:history.back()" class="btn">
             <span class="glyphicon glyphicon-circle-arrow-left"></span> back 
         </a>
         <a href="javascript:void(processPrint());" class="btn btn-info btn-sm pull-right"><span class="glyphicon glyphicon-print"></span> Imprimer</a>
     </div>

     <!-- liking part -->
     <!-- @include('articles.like_article') -->
     <!-- end liking part -->

            <!-- <hr> <br>
            <b>{{ $count = App\Comment::where('article_id',$article->id)->count() }} comments</b> 

            @include('comments.custom_comment')  -->


        </div>       

        <!-- <div class="col-md-8 col-md-offset-2" style="margin-bottom: 10px; background-color: rgba(240, 255, 240, 0.8);">
        	<br>
        	{{ Form::open(array('url' => 'comment_task/' . $article->id)) }}
               {{ csrf_field() }}
	           <div id="commentaire" class="form-group">
                 <div class="col-sm-2">
	             <img class="_1ci img" src="https://www.facebook.com/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="" width="100%" height="100%"> </div>
                 <div class="col-sm-10">
                  <textarea class="form-control" required style="height: 100px; width: 100%" placeholder="comment this article ...!" name="comment_body" id="comment_body" required></textarea> </div>
                 <div class="col-sm-12">
                  <br> <input type="submit" id="apply" value="comment !" class="btn btn-default btn-sm pull-right" name="commenter"><br><br>
                 </div>
                  <br>
	           </div>

            {{ Form::close() }}

            @if($errors->any())
                <ul class="alert alert-danger">
                    <u>Notice</u> : 
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

        </div>    -->

    </div>

</div>


<!-- modal dipose documents -->



<!-- The Modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <span class="close"> X &times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<!-- <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// modal.oncontextmenu  = function(){
//      modal.style.display = "none";
// }

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script> -->



<script language="javascript">
    var gAutoPrint = true;

    function processPrint(){

        if (document.getElementById != null){
            var html = '<HTML>\n<HEAD>\n';
            if (document.getElementsByTagName != null){
                var headTags = document.getElementsByTagName("head");
                if (headTags.length > 0) html += headTags[0].innerHTML;
            }

            html += '\n</HE' + 'AD>\n<BODY>\n';
            var printReadyElem = document.getElementById("ToPrint");

            if (printReadyElem != null) html += printReadyElem.innerHTML;
            else{
                alert("Error, no contents.");
                return;
            }

            html += '\n</BO' + 'DY>\n</HT' + 'ML>';
            var printWin = window.open("","processPrint");
            printWin.document.open();
            printWin.document.write(html);
            printWin.document.close();

            if (gAutoPrint) printWin.print();
        } else alert("Browser not supported.");

    }
</script>

@endsection



