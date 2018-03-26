<div class="row comment user-content">
	<div class="col-2 comment-author">
		<a href=" {{ URL::route('user.show', $thiscomment->author) }} " class="user-content--info--author">
			<img src="/img/user.svg" alt="">
		</a>
	</div>

	<div class="col-10 comment-content">
		<p class="user-content--info">
			<a href=" {{ URL::route('user.show', $thiscomment->author) }} " class="user-content--info--author"> {{ $thiscomment->author->name }} </a> 
			- 
			<span class="user-content--info--date"> {{ Date::parse($thiscomment->created_at)->diffForHumans() }} </span>
			<span class="user-content--edit-links">
				<toggle-comment :comment=" {{ $thiscomment }} "></toggle-comment>
				<a href="#" data-toggle="modal" data-target="#confirmDeleteModal-{{ $thiscomment->id }}"> <img src="/img/trash.svg" alt=""> </a>
			</span>
		</p>
		
		<comment :comment=" {{ $thiscomment }} "></comment>

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