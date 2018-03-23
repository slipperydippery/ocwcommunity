<!-- Reactie Form Input -->
<div class="form-group">
    <textarea name="body" id="body" rows="7" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}">{{ old('body', request('body') ?? $comment->body ?? null) }}</textarea>

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