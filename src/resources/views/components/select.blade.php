<div class="form-group">
    {{ Form::label(str_replace('[]', '', $name), null, ['class' => 'control-label']) }}
    {{ Form::select($name, $options, $value, array_merge(['class' => 'select2'], $attributes)) }}
    <small class="help-block">{{ $errors->first($name) }}</small>
</div>
