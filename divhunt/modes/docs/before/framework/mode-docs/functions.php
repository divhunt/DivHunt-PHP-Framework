<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('docsProject');
        $f->h1('docsProject');
        $f->note('DivHunt::docsProject(callable $callback) : object');
        $f->p('Creates new documentation project if project does not exist based on project unique inditifier (slug).');

        $f->h3('Paremeters');
        $f->parameter('callback', 'Use callback function to configure project.');

        $f->h3('Callback Options');
        $f->parameter('->title(string $title)', 'Set project title.');
        $f->parameter('->slug(string $slug) [a-zA-Z0-9-]', 'Set project unique inditifier. Must match regex.');
        $f->parameter('->description(string $description)', 'Set project description.');

        $f->h3('Return Values');
        $f->p('Function returns project object if project was successfully created or already exist, otherwise returns false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/project.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('docsPage');
        $f->h1('docsPage');
        $f->note('DivHunt::docsPage(string $slug, callable $callback) : object');
        $f->p('Creates new project page. Project must be created before in order to create page.');

        $f->h3('Paremeters');
        $f->parameter('slug', 'Project unique inditifier.');
        $f->parameter('callback', 'Use callback function to configure page.');

        $f->h3('Callback Options');
        $f->parameter('->title(string $title)', 'Set page title.');
        $f->parameter('->slug(string $slug) [a-zA-Z0-9-]', 'Set page unique inditifier. Must match regex.');
        $f->parameter('->category(string $category) [a-zA-Z0-9-]', 'Set page category. Must match regex.');
        $f->parameter('->description(string $description)', 'Set page description.');
        $f->parameter('->time(int $time)', 'Set page read time in minutes.');

        $f->h3('Return Values');
        $f->p('Function returns page object if page was successfully created, otherwise returns false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/page.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('docsSection');
        $f->h1('docsSection');
        $f->note('DivHunt::docsSection(object $page, callable $callback) : bool');
        $f->p('Creates new page section. Page along with project must be created before in order to create section.');

        $f->h3('Paremeters');
        $f->parameter('page', 'Project page object.');
        $f->parameter('callback', 'Use callback function to configure section.');

        $f->h3('Callback Options');
        $f->parameter('->title(string $title)', 'Set section title.');
        $f->parameter('->h1(string $h1)', 'Add section h1 element.');
        $f->parameter('->h3(string $h3)', 'Add section h3 element.');
        $f->parameter('->p(string $p)', 'Add section p element.');
        $f->parameter('->note(string $note)', 'Add section note element.');
        $f->parameter('->warning(string $warning)', 'Add section warning element.');
        $f->parameter('->danger(string $danger)', 'Add section danger element.');
        $f->parameter('->code(string $file_path)', 'Add section code element.');

        $f->h3('Return Values');
        $f->p('Function returns true if section was successfully created, otherwise false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/section.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('docsFunction');
        $f->h1('docsFunction');
        $f->note('DivHunt::docsFunction(object $page, callable $callback) : bool');
        $f->p('Creates new page function. Page along with project must be created before in order to create function.');

        $f->h3('Callback Options');
        $f->parameter('->title(string $title)', 'Set function title.');
        $f->parameter('->category(string $category = false) [a-zA-Z0-9-]', 'Set function category.');
        $f->parameter('->type(string $type = "function")', 'Set function type "function", "method" or "trigger".');
        $f->parameter('->h1(string $h1)', 'Add function h1 element.');
        $f->parameter('->h3(string $h3)', 'Add function h3 element.');
        $f->parameter('->p(string $p)', 'Add function p element.');
        $f->parameter('->note(string $note)', 'Add function note element.');
        $f->parameter('->warning(string $warning)', 'Add function warning element.');
        $f->parameter('->danger(string $danger)', 'Add function danger element.');
        $f->parameter('->parameter(string $name, string $description)', 'Add function parameter description.');
        $f->parameter('->code(string $file_path)', 'Add function code element.');

        $f->h3('Return Values');
        $f->p('Function returns true if function was successfully created, otherwise false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/function.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('docsBlock');
        $f->h1('docsBlock');
        $f->note('DivHunt::docsBlock(object $page, callable $callback) : bool');
        $f->p('Creates new page block. Page along with project must be created before in order to create block.');

        $f->h3('Callback Options');
        $f->parameter('->title(string $title)', 'Set block title.');
        $f->parameter('->category(string $category) [^a-zA-Z0-9-]', 'Set block category. Must match regex.');
        $f->parameter('->code(string $file_path)', 'Set location of file that contains block code.');

        $f->h3('Return Values');
        $f->p('Function returns true if block was successfully created, otherwise false.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/block.php');
    });