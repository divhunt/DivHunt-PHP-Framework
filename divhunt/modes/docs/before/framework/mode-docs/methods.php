<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetProjects');
        $f->h1('docsGetProjects');
        $f->note('DivHunt::docsGetProjects() : array');
        $f->p('Returns array of documentation projects along with all pages.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsCountProjects');
        $f->h1('docsCountProjects');
        $f->note('DivHunt::docsCountProjects() : int');
        $f->p('Returns number of total documentation projects.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns integer.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetProjectBySlug');
        $f->h1('docsGetProjectBySlug');
        $f->note('DivHunt::docsGetProjectBySlug(string $slug) : object');
        $f->p('Returns project object if project exist.');

        $f->h3('Paremeters');
        $f->parameter('slug', 'Project unique inditifier.');

        $f->h3('Return Values');
        $f->p('Returns object if project exist, otherwise false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetProjectTime');
        $f->h1('docsGetProjectTime');
        $f->note('DivHunt::docsGetProjectTime(object $project) : int');
        $f->p('Returns total read time in minutes based on all project pages combined.');

        $f->h3('Paremeters');
        $f->parameter('project', 'Object of project that contains pages.');

        $f->h3('Return Values');
        $f->p('Returns number of minutes time as integer, will return zero if there are no pages in project.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetPageBySlug');
        $f->h1('docsGetPageBySlug');
        $f->note('DivHunt::docsGetPageBySlug(object $project, string $slug) : object');
        $f->p('Returns page from passed project object, if page with unique inditifier (slug) exist.');

        $f->h3('Paremeters');
        $f->parameter('project', 'Object of project that contains pages.');
        $f->parameter('slug', 'Page unique inditifier.');

        $f->h3('Return Values');
        $f->p('Returns page object if page exist, otherwise false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetSectionBySlug');
        $f->h1('docsGetSectionBySlug');
        $f->note('DivHunt::docsGetSectionBySlug(object $page, string $slug) : object');
        $f->p('Returns invidual section from page object based on provided slug.');

        $f->h3('Paremeters');
        $f->parameter('page', 'Object of page that contains sections.');
        $f->parameter('slug', 'In this case, slug is array index with prefix "s".');

        $f->h3('Return Values');
        $f->p('Returns section object if section exist, otherwise false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetFunctionBySlug');
        $f->h1('docsGetFunctionBySlug');
        $f->note('DivHunt::docsGetFunctionBySlug(object $page, string $slug) : object');
        $f->p('Returns invidual function or method from page object based on provided slug.');

        $f->h3('Paremeters');
        $f->parameter('page', 'Object of page that contains functions and methods.');
        $f->parameter('slug', 'In this case, slug is array index with prefix "f" for functions or "m" for methods.');

        $f->h3('Return Values');
        $f->p('Returns function or method object if function or method exist, otherwise false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('docsGetBlocksBySlug');
        $f->h1('docsGetBlocksBySlug');
        $f->note('DivHunt::docsGetBlocksBySlug(object $page, string $slug) : array');
        $f->p('Returns array with all blocks from provided category slug.');

        $f->h3('Paremeters');
        $f->parameter('page', 'Object of page that contains blocks.');
        $f->parameter('slug', 'Block category unique inditifier.');

        $f->h3('Return Values');
        $f->p('Returns array with all blocks from category.');
    });