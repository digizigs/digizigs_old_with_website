<?php

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\Setting();
        }

        if (is_array($key)) {
            return \App\Models\Setting::set($key[0], $key[1]);
        }

        $value = \App\Models\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}


if (! function_exists('app_setting')) {

    function app_setting($name){

        if($name == 'app_name'){
            return 'Digizigs New Setting';
        }


        if($name == 'app_name'){
            return '1.0';
        }

        
    }
}

