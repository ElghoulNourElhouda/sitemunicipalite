@extends('layouts.app');

@section('content')
<!-- preloader   -->
<!-- <div class='preloader'><div class='loaded'></div></div>  -->
<!-- end preloader -->
<div class="form-control" style="width: 95%; padding-bottom: 5%; padding-top: 5%">



             
               <h4  align="center"><b style="color:orange"><u>Liste</u></b> des contacts enregistrés dans votre carnet d’adresses </h4>

                    
                 <!-- boutton retour au page précedent -->
                     <a href="javascript:history.back()" class="btn btn-primary">
                                 <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                             </a>
                             <!-- / boutton -->

 @if(isset($contacts) and count($contacts)> 0)

               <table class="table" style="background-color:white">   

                <thead style="background-color: #5CA7A3; color:white">
                    <tr><th> </th> <th>Nom</th> <th>Prénom</th> <th>Numéro</th><th>Catégorie</th> <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody style="background-color:white">

               

                    @foreach ($contacts as $contact)

                        <tr>
                            <td> </td>
                            <td class="text-danger"><strong style="color: orange">{!! $contact->nom !!}</strong></td>
                            <td class="text-primary"><strong>{!! $contact->prenom !!}</strong></td>
                            <td class="text-primary"><strong> +{!! $contact->numero !!}</strong></td>
                            <td class="text-primary"><strong style="color: orange">{!! $contact->categorie !!}</strong></td>
                            <td class="text-primary" style="width:20px">
                            <input type="hidden" name="idc" value = {!! $contact->id !!}>
                            <a href="#supprimercontact"  class="btn btn-danger" data-toggle="modal" data-target="#supprimercontact" style="width: 100px"> Supprimer </a>
                           </td>
                            <td class="text-primary" style="width:20px">
                            {!! Form::open(['url' => 'modifiercontact']) !!}
                              <input type="hidden" name="idc" value = {!! $contact->id !!}>
                              <input type="submit" name="modifier" value="Modifier" class=" btn btn-warning" style="width: 100px">
                            {!! Form::close() !!}

                            </td>
                        </tr>

                    @endforeach
               

                </tbody>
              </table>


  <!-- Modale verification de suppression -->


            <!-- Modal -->
    <div id="supprimercontact" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog"  aria-hidden="true">
       <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> Close (×)</button>
                 <h4 class="modal-title" align="center"><b style="color:orange">Supprimer</b><b> - Contact</b></h4>
              </div>
         
           <div class="modal-body">
              <div align="center" >
                 <b> Voulez-vous vraiment supprimer ce contact  : <u style="color:orange"> {!! $contact->nom !!} {!! $contact->prenom !!} </u>    ?   </b><br/><br/><br/><br/>
                        
                 {!! Form::open(['url' => 'supprimercontact']) !!}
               <input type="hidden" name="idc" value = {!! $contact->id !!} >
               <input type="submit" name="supprimer" value="Oui Supprimer !" class=" btn btn-danger pull-right"><br/>
                    
                 {!! Form::close() !!}
                      
              </div>
            </div>
         </div>

        </div>
    </div>
      
  <!-- end modal -->
    @else         <div class="alert alert-warning text-center">        Aucun contact trouvé !     Voulez-vous ajouter  <a href="#ajoutcontact" data-toggle="modal" > le premier contact</a>?         </div>    @endif

     <div id="ajoutcontact"   class="modal fade bs-example-modal-md"   tabindex="-1"  role="dialog"    aria-labelledby="myLargeModalLabel"       aria-hidden="true">
       <div class="modal-dialog modal-md">
         <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> Fermer (x)</button>
                <h4 class="modal-title" id="myLargeModalLabel" align="center"><b style="color:orange">Ajout </b> <b> d'un contact </b></h4>
              </div>
              <div class="modal-body">

                                  {!! Form::open(['route' => 'contacts.store']) !!}

                                 <table width="100%" border="1px" style="border-color: #4bcaff;"" >

                                     <tr><td width="30%" align="center">
                                      <h6><b> Nom    :</b></h6></td>
                                       <td>

                                           {!!form::text('nom',null,['class'=>'form-control bfh-phone','placeholder'=>'     nom du contact  ','required']) !!}
                                          {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                                     </td></tr>

                                     <tr><td width="30%" align="center">
                                      <h6><b> Prenom    :</b></h6></td>
                                       <td>

                                           {!!form::text('prenom',null,['class'=>'form-control bfh-phone','placeholder'=>'  Prenom du contact ','required']) !!}
                                          {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                                     </td></tr>

                                       <tr><td width="30%" align="center">

                                          <h6><b>Numero    :</b></h6></td>

                                          <td >

                                          <select name="pays" id="pays4" class="form-control pull-left" onclick="document.getElementById('numero').value=this.value " style="width: 25%"> @include('pays')</select>

                                         <!-- {!!form::text('numero',null,['class'=>'form-control bfh-phone','placeholder'=>'  Numéro du contact ']) !!}  -->
                                          <input type="text" minlength="11"  name="numero" id="numero" class="form-control pull-right" placeholder="Numéro du contact" onclick="this.value=document.getElementById('pays4').value " style="width: 75%" required>
                                          {!! $errors->first('numero', '<small class="help-block">:message</small>') !!}

                                          </td></tr>

                                        <tr><td width="30%" align="center" >

                                             <h6><b> Categorie    :</b></h6></td>
                                             <td align="center">
                                               <select name="categorie" class="form-control">
                                                 <option value="Amis"> Amis </option>
                                                 <option value="Famille"> Famille </option>
                                                 <option value="Entreprise"> Entreprise </option>
                                                </select>
                                         
                                          {!! $errors->first('categorie', '<small class="help-block">:message</small>') !!}
                                           <input type="hidden" name="user_id" value={{ Auth::user()-> id }}>
                                           </td></tr>

                                   <!--    <tr>
                                       <td colspan="2">


                                          {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Le contenu de Votre message ...']) !!}

                                          {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}

                                      </td></tr> -->

                                      <tr><td colspan="2">
                                       {!! Form::submit('Ajouter', ['class' => 'btn btn-success btn-block pull-right']) !!}
                                     </td></tr></table>
                        {!! Form::close() !!}

              </div>
        </div>
    </div>
</div>


</div>

@stop
