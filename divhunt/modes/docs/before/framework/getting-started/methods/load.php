<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('load');
        $f->title('getLoad');
        $f->h1('getLoad');
        $f->note('DivHunt::getLoad(string $key, string $name) : array');
        $f->p('Checks if load exist with given key and name.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Load key.');
        $f->parameter('name', 'Load name.');

        $f->h3('Return Values');
        $f->p('Returns array with all loads if load exist, otherwise false.');
        $f->code(__DIR__ . '/../code/load.php');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('load');
        $f->title('setLoad');
        $f->h1('setLoad');
        $f->note('DivHunt::setLoad(string $key, string $name, array $data = []) : void');
        $f->p('Use method setLoad() to load anything into framework and later on get or check if loaded. Great example for this is that every framework class will be added into load on page run, so now we can do checks if class is loaded or not..');
        $f->warning('This method does not do anything else than just creates array and sets that something is loaded.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Load key.');
        $f->parameter('name', 'Load name.');
        $f->parameter('data', 'Key - Value single dimensional array. Value must be scalar.');

        $f->h3('Return Values');
        $f->p('This method does not have return value.');
        $f->code(__DIR__ . '/../code/load.php');
        $f->note('Keep in mind that in most cases, you won\'t even have to use setLoad(), this method is only for creators mostly.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('load');
        $f->title('loadExist');
        $f->h1('loadExist');
        $f->note('DivHunt::loadExist(string $key, string $name) : bool');
        $f->p('Checks if load exist with given key and name.');

        $f->h3('Paremeters');
        $f->parameter('key', 'Load key.');
        $f->parameter('name', 'Load name.');

        $f->h3('Return Values');
        $f->p('Returns bool.');
        $f->code(__DIR__ . '/../code/load.php');
    });