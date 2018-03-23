@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 pageblock">
				<div class="post user-content">
					<h1 class="display-5"> {{ $post->title }} </h1>
					<p class="user-content--info user-content--info__post">
						<a href=" {{ URL::route('user.show', $post->author) }} " class="user-content--info--author"> {{ $post->author->name }} </a> 
						- 
						<span class="user-content--info--date"> {{ Date::parse($post->created_at)->diffForHumans() }} </span>
						<span class="user-content--edit-links">
							<a href=" {{ URL::route('post.edit', $post) }} "><img src="/img/edit.svg" alt=""></a>
						</span>
					</p>
					<div class="article-tags">
						@foreach($post->tags as $tag)
							<a href="" class="btn btn-sm btn-outline-primary">
								{{ $tag->name }}
							</a>
						@endforeach
					</div>
					@foreach(nl2a($post->body) as $paragraph)
						<p> {{ $paragraph }} </p>
					@endforeach
				</div>

				@foreach($post->comments as $thiscomment)
					@include('comment.partials.comment')
				@endforeach

				@include('comment.partials.create')
				
			</div>

			<div class="col">
				<div class="sidebar">
					<h4>Here a sidebar item</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
				</div>
			</div>
	</div>

@endsection


{{-- @section('additional-scripts')
@endsection --}}