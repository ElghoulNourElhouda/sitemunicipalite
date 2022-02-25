
{{ Form::open(array('url' => 'read/' . $notification->id)) }}

	<button class="btn btn-link" type="submit"> 
		L'offre " <strong> {{ $notification->data['offre']['work'] }} </strong> " est bloqué par l'admin	<small> {{ $notification->created_at->DiffForHumans() }} </small> </button>

	<?php $url = $notification->data['offre']['id']; ?>

	<input type="hidden" name="goto" id="goto" value={{ $url }} >

{{ Form::close() }}