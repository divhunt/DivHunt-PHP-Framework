<?php

    /**
     * Load type: Docs - Before
     * Renders documentation from classes, components and other.
     *
     * @see https://divhunt.com
     */

    ob_start();    

    DivHunt::docsProject(function($project)
    {
        $project->title('Framework')->slug('framework')->description('Get familiar with modular and extremely efficient framework for PHP called DivHunt.');
    });

    // Framework
    include 'framework/getting-started/app.php';
    include 'framework/function-trigger/app.php';
    include 'framework/function-log/app.php';
    include 'framework/function-class/app.php';
    include 'framework/mode-app/app.php';
    include 'framework/mode-ajax/app.php';
    include 'framework/mode-docs/app.php';