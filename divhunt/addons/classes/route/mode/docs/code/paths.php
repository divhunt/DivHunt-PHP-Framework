route::setPath('office', 'admin/office');

// Using ~ followed with path key.
include route::get('~office/analytics', function($route)
{
    $route->load('analytics');
});

// Get paths outside 
echo route::getPath('office'); // Returns '/admin/office/';