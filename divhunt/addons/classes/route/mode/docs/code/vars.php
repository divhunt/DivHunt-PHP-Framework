include route::get('/user/:id', function($route)
{
    $route->load('user');
});

// If route is matched, value of 'id' will be available everywhere using route method var();
echo route::var('id');
