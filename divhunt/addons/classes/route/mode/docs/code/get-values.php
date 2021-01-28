// Using ? followed with parameter name.
include route::get('/admin/?view', function($route)
{
    // Get value from $_GET['view']
    if(route::var('view') == 'analytics')
    {
        $route->load('analytics');
    }
    else
    {
        $route->load('dashboard');
    }
});