<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('class_load');
        $t->h1('class_load');
        $t->note('DivHunt::trigger("class_load")');
        $t->p('Runs trigger callback after class is successfully loaded.');

        $t->h3('Callback Values');
        $t->parameter('object $data', 'Returns object data (path, etc) for class.');
    });

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('class_instance');
        $t->h1('class_instance');
        $t->note('DivHunt::trigger("class_instance")');
        $t->p('Runs trigger callback on class instance.');

        $t->h3('Callback Values');
        $t->parameter('object $class', 'Returns instance of class.');
        $t->parameter('object $data', 'Returns object data (path, etc) for class.');
    });
