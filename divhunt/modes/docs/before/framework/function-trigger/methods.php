<?php
    
    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getTriggers');
        $f->h1('Get all triggers by name');
        $f->note('DivHunt::getTriggers(string $name) : array');
        $f->p('Returns all triggers by given name if triggers exists.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Trigger name.');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('runTrigger');
        $f->h1('Run all triggers by name');
        $f->note('DivHunt::runTrigger(string $name, ...$data) : void');
        $f->p('Runs all triggers by given name if triggers exists.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Trigger name.');
        $f->parameter('data', 'Pass as many data as needed to be returned into trigger callback.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });