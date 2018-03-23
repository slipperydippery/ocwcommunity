
<!-- Titel Form Input -->
<div class="form-group">
    <label for="title">Titel</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', request('title') ?? $post->title ?? null) }}" autofocus>

	@if ($errors->has('title'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif
</div>

<!-- Bericht Form Input -->
<div class="form-group">
    <label for="body">Bericht</label>
    <textarea name="body" id="body" rows="7" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body', request('body') ?? $post->body ?? null) }}</textarea>

	@if ($errors->has('body'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('body') }}</strong>
	    </span>
	@endif
</div>


{{-- {{ old('tags', request('tags') ?? $post->tags ?? null) ? $post->tags->contains($tag) ? 'active' : '' : '' }} --}}
<!--  Labels Form Input -->
@foreach($tagcategories as $tagcategory)
	<div class="row">
		<div class="col">
			<div class="btn-group-toggle" data-toggle="buttons">
				<h5 class="inline-title"> {{ $tagcategory->name }}: </h5>
				@foreach($tagcategory->tags as $tag)
					<label class="btn btn-sm btn-outline-primary {{ collect(old('tags', request('tags') ?? isset($post->tags) ? $post->tags->pluck('id') : null ))->contains($tag->id) ? 'active' : '' }}">
					    <input type="checkbox" name="tags[]" value=" {{ $tag->id }} " {{ collect(old('tags', request('tags') ?? isset($post->tags) ? $post->tags->pluck('id') : null ))->contains($tag->id) ? 'checked' : '' }}/>
				        {{ $tag->name }}
					</label>
				@endforeach
			</div>
		</div>
	</div>
@endforeach

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>


