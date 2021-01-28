// Bool route
if(route::put('/'))
{
    echo 'Hello!';
}

// File load route
include route::put('/', function($route)
{
    echo 'Hello!';
});

