// Bool route
if(route::delete('/'))
{
    echo 'Hello!';
}

// File load route
include route::delete('/', function($route)
{
    echo 'Hello!';
});

