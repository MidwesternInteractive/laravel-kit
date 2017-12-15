<?php

/**
 * This allows the use of config style
 * arrays as options in selects, radios,
 * check boxes or any other variety.
 */

if (! function_exists('options')) {
    function options($key = null) {
        $keys = explode('.', $key);
        $file = array_shift($keys);

        if (file_exists($path = app_path('Options/' . $file . '.php'))) {
            $options = (include $path);
            return $options[implode('][', $keys)];
        } else {
            return [];
        }
    }
}

/**
 * Get the key for a specific option
 */
if (! function_exists('option_key')) {
    function option_key($value = null, $key = null) {
        return array_search($value, options($key)) !== false
            ? array_search($value, options($key))
            : null;
    }
}
