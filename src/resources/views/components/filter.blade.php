{{ Form::open(['method' => 'get']) }}
{{ Form::select($name, $options, $value, array_merge(['class' => 'select2', 'data-filter'], $attributes)) }}
{{ Form::close() }}
