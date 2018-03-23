<div class="row comment user-content">
	<div class="col-2 comment-author">
		<a href=" {{ URL::route('user.show', $post->author) }} " class="user-content--info--author">
			<img src="/img/user.svg" alt="">
		</a>
	</div>

	<div class="col-10 comment-content">
		<p class="user-content--info">
			<a href=" {{ URL::route('user.show', $post->author) }} " class="user-content--info--author"> {{ $post->author->name }} </a> 
			- 
			<span class="user-content--info--date"> {{ Date::parse($post->created_at)->diffForHumans() }} </span>
			<span class="user-content--edit-links">

				<a href=" {{ URL::route('comment.edit', $thiscomment) }} "> <img src="/img/edit.svg" alt=""> </a>
				<!-- Button trigger modal -->
				<a href=" {{ URL::route('comment.destroy', $thiscomment) }} " data-toggle="modal" data-target="#confirmDeleteModal-{{ $thiscomment->id }}"> <img src="/img/trash.svg" alt=""> </a>
			</span>
		</p>
		
		@foreach(nl2a($thiscomment->body) as $paragraph)
			<p> {{ $paragraph }} </p>
		@endforeach

	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal-{{ $thiscomment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> Weet je het zeker? </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Dit zal je reactie verwijderen.
			</div>	
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-dismiss="modal"> Annuleer </button>

				<form action="{{ route('comment.destroy', $thiscomment) }}" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}
					{{ method_field('DELETE') }}
			        <input type="submit" value=" Verijder reactie " class="btn btn-primary" />
				</form>

			</div>
		</div>
	</div>
</div>