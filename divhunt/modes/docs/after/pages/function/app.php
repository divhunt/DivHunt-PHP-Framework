<?php

    if(!$project = DivHunt::docsGetProjectBySlug(route::var('project')))
    {
        DivHunt::reload(route::getPath('docs') . '?mode=docs');
    }

    include block::use('setter', 'framework', function($setter)
    {
        $setter->wrap(false);
        $setter->title('DivHunt - PHP Web Framework');
        $setter->description('DivHunt Framework is minimal, modular and extremely efficient framework for PHP');
        $setter->name('DivHunt');
        $setter->fonts('https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap', '');
        $setter->fontawesome(true);
    });

    include block::use('global', 'framework')->load();
    include block::use('static', 'docs')->load();

    if(!$page = DivHunt::docsGetPageBySlug($project, route::var('page')))
    {
        DivHunt::reload(route::getPath('docs') . '?mode=docs&project=' . $project->slug);
    }

    if(!$function = DivHunt::docsGetFunctionBySlug($page, route::var('function')))
    {
        DivHunt::reload(route::getPath('docs') . '?mode=docs&project=' . $project->slug . '&page=' . $page->slug);
    }