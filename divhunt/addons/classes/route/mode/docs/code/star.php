// Every request that starts with /admin, will be matched with this route.
include route::get('/admin/*', function($route)
{
    $route->load('admin');
});
