<div class="col-md-6">
    <div class="form-group">
        {{ Form::label($name, null, ['class' => 'control-label']) }}
        {{ Form::password($name, array_merge(['class' => 'form-control', 'id' => $name], $attributes)) }}
        <small class="help-block">{{ $errors->first($name) }}</small>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {{ Form::label($name, null, ['class' => 'control-label']) }}
        {{ Form::password($name . '_confirmation', array_merge(['class' => 'form-control', 'data-parsley-equalto' => '#password'], $attributes)) }}
        <small class="help-block">{{ $errors->first($name) }}</small>
    </div>
</div>
