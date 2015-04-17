<div class="form-group">
	{!! Form::label($name, $label) !!}
	{!! $control !!}
	@if($error)
		<p class="error-message">{{ $error }}</p>
	@endif
</div>