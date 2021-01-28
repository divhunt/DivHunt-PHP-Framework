// Bool route
if(route::get('/'))
{
    echo 'Hello!';
}

// File load route
include route::get('/', function($route)
{
    echo 'Hello!';
});

