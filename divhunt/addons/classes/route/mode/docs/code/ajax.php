include route::ajax(['post'], '/admin/ajax', function($route)
{
    $route->load('ajax');
});

// File 'ajax.php' will be added into and runned only in "Ajax" mode.