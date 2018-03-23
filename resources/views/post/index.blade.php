@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 forum">
				<h1 class="display-4">Forum </h1>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-9 pageblock forum-list">

				@foreach($posts as $post)
					<div class="forum-post">
						<a href=" {{ URL::route('post.show', $post) }} ">
							<h5> {{ $post->title }} </h5>
						</a>
						<p class="post-info">
							<a href="#" class="post-info--author"> {{ $post->author->name }} </a> 
							- 
							<span class="post-info--date"> {{ $post->created_at->diffForHumans() }} </span>
						</p>
						<p class="snippet"> {{ str_limit($post->body, 300) }} </p>
						<div class="article-tags">
							@foreach($post->tags as $tag)
								<a href="#" class="btn btn-sm btn-outline-primary">
									{{ $tag->name }}
								</a>
							@endforeach
						</div>
					</div>
				@endforeach
				
			</div>

			<div class="col-md-3">
				<div class="sidebar">
					<h4>Filters</h4>
					@foreach($tagcategories as $tagcategory)
						<div class="sidebar--block">
							<h5> {{ $tagcategory->name }} </h5>
							<div class="btn-group-toggle" data-toggle="buttons">
								@foreach($tagcategory->tags as $tag)
									<label class="btn btn-outline-secondary">
										<input type="checkbox" checked autocomplete="off"> {{ $tag->name }}
									</label>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
				<div class="sidebar">
					<a href=" {{ URL::route('post.create') }} " class="btn btn-primary" > Plaats een nieuw bericht </a>
				</div>
			</div>


		</div>
	</div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}