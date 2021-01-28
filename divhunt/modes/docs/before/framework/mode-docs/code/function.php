DivHunt::docsFunction($page, function($f)
{
    $f->title('docsProject');
    $f->h1('docsProject');
    $f->note('DivHunt::docsProject(callable $callback) : object');
    $f->p('Creates new documentation project if project does not exist based on project unique inditifier (slug).');

    $f->h3('Paremeters');
    $f->parameter('callback', 'Use callback function to configure project.');

    $f->h3('Callback Options');
    $f->parameter('->title(string $title)', 'Set project title');
    $f->parameter('->slug(string $slug) [a-zA-Z0-9-]', 'Set project unique inditifier. Must match regex.');
    $f->parameter('->description(string $description)', 'Set project description.');

    $f->h3('Return Values');
    $f->p('Function returns project object if project was successfully created or already exist, otherwise returns false.');

    $f->h3('Example #1');
    $f->code(__DIR__ . '/code/project.php');
});