

{{ Form::open(array('url' => 'read/' . $notification->id)) }}

	<button class="btn btn-link" type="submit"> 
		@if ($notification->data['usr']['users_id'] == auth()->id() ) 
		    
		    you'have

		@else

			{{ $notification->data['usr']['username'] }} has
		
		@endif

		replied to your comment " <strong> {{ $notification->data['comment']['comment_body'] }} </strong> "<small> {{ $notification->created_at->DiffForHumans() }} </small> </button>

	<?php $url = $notification->data['comment']['article_id']; ?>

	<input type="hidden" name="goto" id="goto" value={{ $url }} >

{{ Form::close() }}