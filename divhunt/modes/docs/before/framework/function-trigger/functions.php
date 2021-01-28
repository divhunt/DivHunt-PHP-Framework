<?php
    
    DivHunt::docsFunction($page, function($f)
    {
        $f->title('trigger');
        $f->h1('trigger');
        $f->note('DivHunt::trigger(string $name, array $modes, callable $callback) : void');
        $f->p('Create new trigger that will be executed on trigger callback.');

        $f->h3('Paremeters');
        $f->parameter('name [a-zA-Z0-9_]', 'Trigger name. Must match regex.');
        $f->parameter('modes', 'Modes where trigger will be available. Available modes: "app", "ajax", "spa", "build", "develop", "docs" or "any" for any.');
        $f->parameter('callback', 'Run any piece of code in callback function. In some cases, callback function may contain parameters.');

        $f->h3('Return Values');
        $f->p('Function does not have any return values.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/trigger.php');
    });