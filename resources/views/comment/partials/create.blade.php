@guest
	<h4><a href=" {{ URL::route('login') }} ">Log in</a> om een reactie achter te laten</h4>
@else
	<div class="addcomment">
		<h3>Wil je nog wat zeggen?</h3>
		<form action="{{ route('post.comment.store', $post) }}" method="post" accept-charset="utf-8">
		    {{ csrf_field() }}
			@include('comment.partials.form', ['submittext' => 'Plaats reactie'])
		</form>
	</div>
@endguest
