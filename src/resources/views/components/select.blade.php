<div class="form-group">
    {{ Form::label(str_replace('[]', '', $label ?: $name), null, ['class' => 'control-label']) }}
    {{ Form::select($name, $options, $value, array_merge(['class' => 'select2 form-control'], $attributes)) }}
    <small class="help-block">{{ $errors->first($name) }}</small>
</div>
