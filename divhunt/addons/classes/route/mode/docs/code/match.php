// Bool route
if(route::match(['get', 'post'], '/'))
{
    echo 'Hello!';
}

// File load route
include route::match(['get', 'post'], '/', function($route)
{
    echo 'Hello!';
});

