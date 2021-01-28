// Bind single domain
include bind::domain(function($domain) 
{
    $domain->tdl('com');
    $domain->domain('divhunt');
    $domain->https(true);
    $domain->path('sites/divhunt');
});

// Bind any domain
include bind::domain(function($domain) 
{
    $domain->tdl(bind::getTld());
    $domain->domain(bind::getDomain());
    $domain->subdomain(bind::getSubdomain());
    $domain->https(bind::isHttps());
    $domain->path('sites/any');
});