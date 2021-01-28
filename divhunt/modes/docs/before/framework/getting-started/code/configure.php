require 'divhunt/app.php';

include DivHunt::configure(function($divhunt)
{
    $divhunt->path('/');
});