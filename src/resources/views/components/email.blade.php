<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::email($name, $value, array_merge(['class' => 'form-control', 'parsley-type' => 'email'], $attributes)) }}
    <small class="help-block">{{ $errors->first($name) }}</small>
</div>
