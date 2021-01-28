// Bool route
if(route::post('/'))
{
    echo 'Hello!'.
}

// File load route
include route::post('/', function($route)
{
    echo 'Hello!';
});

