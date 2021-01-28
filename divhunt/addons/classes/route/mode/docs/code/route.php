// Initiate class route
DivHunt::class('route')->from('packages');

// Bool route
if(route::get('/'))
{
    echo 'Welcome to homepage'.
}

// File load route
include route::get('/', function($route)
{
    $route->load('pages/home'); 
});

