// Best for development, while on local.
include DivHunt::configure(function($divhunt)
{
    $divhunt->path('../');
    $divhunt->develop(true);
    $divhunt->password(null);
    $divhunt->logging(true, true, true);
    $divhunt->timing(true, 1500);
});

// Best for production.
include DivHunt::configure(function($divhunt)
{
    $divhunt->path('../');
    $divhunt->password('very_long_and_secret_password');
    $divhunt->logging(false, true, true);
    $divhunt->timing(true, 1500);
});
