<div class="form-group">
    <fieldset>
    	<legend>{{ $legend }}</legend>
        @foreach ($values as $key => $value)
            <div class="am-radio inline">
                {{ Form::radio($name, $value, $default, array_merge($attributes, ['id' => $name . '_' . $key])) }}
                <label for="{{ $name . '_' . $key }}">{{ ucfirst(str_replace(['[]', '_'], ['', ' '], $value)) }}</label>
            </div>
    	 @endforeach
    </fieldset>
    <small class="help-block">{{ $errors->first($name) }}</small>
</div>
