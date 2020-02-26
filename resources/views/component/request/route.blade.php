@php
    $url = request()->url();
    $route = app('router')->getRoutes()->match(app('request')->create($url));
@endphp