// Set load
DivHunt::setLoad('class', 'route', ['path' => 'path_to_class']);

// Check if class "route" is loaded
if(!DivHunt::loadExist('class', 'route'))
{
    echo 'Route class is missing, oh, I must die()!';
}

// You can load anything, does not need to be classes specifically, let's use blocks
DivHunt::setLoad('blocks', 'jquery', ['version' => '3']);

if(DivHunt::loadExist('blocks', 'jquery'))
{
    echo 'We have jQuery!';
}

// Will return array with all loaded jquery blocks along with data (version);
print_r(DivHunt::getLoad('blocks', 'jquery')); 