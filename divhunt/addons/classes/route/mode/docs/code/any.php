// Bool route
if(route::any('/'))
{
    echo 'Hello!';
}

// File load route
include route::any('/', function($route)
{
    echo 'Hello!';
});

