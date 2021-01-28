<?php
    
    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is "Docs" mode?');
        $s->p('"Docs" mode helps you write documentation easier for your projects by allowing you to write it anywhere inside your project files. It does not require any database connection and all data is stored into array. Visibility of documentation relies on packages that are used on current loaded page, which means that if you have loaded "route" class, documentation for "route" will be automatically added into "docs" mode.');

        $s->note('GET site.com?mode=docs');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Projects');
        $s->h1('Projects');
        $s->p('Documentation is divided into projects. You can have as many needed projects, and each project can contain pages, while these pages can contain sections, functions, methods and blocks.');
        $s->p('Get started by creating your first project.');
        $s->code(__DIR__ . '/code/project.php');
        $s->p('With this piece of code, we successfully created new project. Now that we have project, we can start creating project pages.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Pages');
        $s->h1('Pages');
        $s->p('Pages helps you organize your documentation even futher, and there is more, pages can contain sections, functions, methods and blocks, but more about that later, lets start by creating your first page.');
        $s->note('In order to create project pages, we need to know project slug. Slug is unique inditifier for project.');
        $s->code(__DIR__ . '/code/page.php');
        $s->p('We are one step away to start writting documentation. Lets move on to creating sections.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Sections');
        $s->h1('Sections');
        $s->p('Sections are dynamic blocks that can be structured in more different ways. They are last step for writting documentation.');
        $s->note('In order to create page sections, page object must be provided.');
        $s->code(__DIR__ . '/code/section.php');
        $s->p('Congratulation! We have successfully created our first documentation project, page and section, you can now keep adding more sections, and even functions, methods and blocks or create new pages, and even new projects.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Functions');
        $s->h1('Functions');
        $s->p('"Docs" mode allows you to document functions as own and bind them to page. Function has its own section with elements. Functions can be also seperated as methods and triggers by passing type property with value "method".');
        $s->note('Function and methods and triggers are exactly same in this case, however we have seperated those in order to be able to futher organize. What each one means, is only up to you.');
        $s->note('In order to create page function, page object must be provided.');
        $s->code(__DIR__ . '/code/function.php');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Blocks');
        $s->h1('Blocks');
        $s->p('Blocks are usually HTML code pieces. The purpose of blocks is to organize front-end of project, and document every component built visually for later easy reuse.');
        $s->note('In order to create project block, page object must be provided.');
        $s->code(__DIR__ . '/code/block.php');
    });