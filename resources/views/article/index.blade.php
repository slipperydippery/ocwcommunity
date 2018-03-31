@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				here all the articles
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 pageblock forum-list">
				@foreach($articles as $article)
					<h5> {{ $article->title }} </h5>
					<p> {{ $article->body }} </p>

				@endforeach
			</div>
		</div>

		<div class="col-md-3">
			<div class="sidebar">
				<a href=" {{ URL::route('article.create') }} " class="btn btn-primary" > Maak een artikel </a>
			</div>
		</div>
	</div>
@stop

@section('additional-scripts')
@endsection