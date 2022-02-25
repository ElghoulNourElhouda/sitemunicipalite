
<style>
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
    input[type="file"] {
        display: none;
    }
</style>

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '10']) !!}
</div>

<div class="form-group">
    <label class="custom-file-upload"> 
    <input type="file" id="vector" name="vector" class="form-control" accept="svg,tif,gif,png,jpg" onchange="document.getElementById('picture').value=this.value" onload="document.getElementById('image').value=this.value" > add a vector </label>    
    <input type="texte" name="picture" id="picture" class="form-control" disabled > 
</div>   
    

<!--
<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', date('m/d/Y'), ['class' => 'form-control', 'placeholder' => 'MM/DD/YYYY']) !!}
</div>   -->


<div class="form-group">
    {!! Form::submit($submitButtonName, ['class' => 'btn btn-primary']) !!}
</div>
<!--
<script type="text/javascript">
    /* UPLOAD : verification EXTENSION */
    function testExtension(valeur, extensionsok) {
        var extensionsok; // extensions acceptées
        var valeur = valeur.toLowerCase(); // en minuscule
        var chainearray = valeur.split('.');
        var chaineext = chainearray[chainearray.length-1]; // extension du fichier
        if(extensionsok.indexOf(chaineext)==-1) { // extension PAS ok
           alert('Erreur : ce fichier n\'est pas valide !\n\nIl faut vérifer que l\'extensions de fichier soit de type : ' + extensionsok);
           image.value=none;
           }
    };
</script>   -->