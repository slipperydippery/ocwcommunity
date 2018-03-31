<!-- Titel Form Input -->
<div class="form-group">
    <label for="title">Titel</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', request('title') ?? $article->title ?? null) }}" autofocus>

	@if ($errors->has('title'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif
</div>

<!-- Artikel Form Input -->
<div class="form-group">
    <label for="body">Artikel</label>
    <textarea name="body" id="body" rows="7" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body', request('body') ?? $article->body ?? null) }}</textarea>

	@if ($errors->has('body'))
        <span class="invalid-feedback">
	        <strong>{{ $errors->first('body') }}</strong>
	    </span>
	@endif
</div>

<!-- Add Submit Field -->
<div class="form-group">
    <input type="submit" value=" {{ $submittext }} " class="btn btn-primary form-control" />
</div>