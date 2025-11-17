<?php

if (!function_exists('region_route')) {
    function region_route($name, $params = [])
    {
        $region = session('region', config('app.default_region', 'usa'));        
        if ($region === config('app.default_region', 'usa')) {
            return route($name, $params);
        }        
        return route('region.' . $name, array_merge(['region' => $region], $params));
    }
}