<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('getActiveMode');
        $f->h1('getActiveMode');
        $f->note('DivHunt::getActiveMode() : string');
        $f->p('Returns framework active mode.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('getModes');
        $f->h1('getModes');
        $f->note('DivHunt::getModes() : array');
        $f->p('Returns all available mods.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('modeExist');
        $f->h1('modeExist');
        $f->note('DivHunt::modeExist(string $mode) : bool');
        $f->p('Checks if provided mode exist.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Framework mode name.');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('isActiveMode');
        $f->h1('isActiveMode');
        $f->note('DivHunt::isActiveMode(string|array $mode, callable $callback = false) : bool');
        $f->p('Checks if provided mode is currently active.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Framework mode name as string or array with multiple modes.');
        $f->parameter('callback', 'Callback function that will be runned only if mode is active.');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('getModeData');
        $f->h1('getModeData');
        $f->note('DivHunt::getModeData(string $mode = false) : array');
        $f->p('Returns mode data.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Framework mode name. If not provided, data from currently active mode will be returned.');

        $f->h3('Return Values');
        $f->p('Returns array. Can return false if mode does not exist.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('setMode');
        $f->h1('setMode');
        $f->note('DivHunt::setMode(string $mode) : void');
        $f->p('Change framework mode. This does not initiate page redirect, it only loads changed mode files at shutdown.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Framework mode name.');

        $f->h3('Return Values');
        $f->p('Method does not have return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('modes');
        $f->title('switchMode');
        $f->h1('switchMode');
        $f->note('DivHunt::switchMode(string $mode) : void');
        $f->p('Force mode change. Method will make redirect to provided mode and exit application. If headers are sent, link will be created for click.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Framework mode name.');

        $f->h3('Return Values');
        $f->p('Method does not have return value.');
    });