<div class="add reply">
	<h3>wil je nog wat zeggen?</h3>
	<form action="{{ route('comment.store') }}" method="post" accept-charset="utf-8">
	    {{ csrf_field() }}
		@include('comment.partials.form', ['submittext' => 'Plaats reactie'])
	</form>
</div>