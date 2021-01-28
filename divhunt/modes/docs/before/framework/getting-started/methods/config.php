<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('config');
        $f->title('getConfig');
        $f->h1('getConfig');
        $f->note('DivHunt::getConfig(string $key) : mix');
        $f->p('Returns config with given key.');

        $f->h3('Paremeters');
        $f->parameter('key [_a-zA-Z\/]', 'Config key. Config is multidimensional array, so it is possible to go deeper in array by passing following key example "timing/enabled". Max 2 levels.');

        $f->h3('Return Values');
        $f->p('Returns mix depends on config, can be integer, float, string, array, object, null and bool. If key does not exist, return will be false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('config');
        $f->title('setConfig');
        $f->h1('setConfig');
        $f->note('DivHunt::setConfig(string $key, mix $value) : void');
        $f->p('Sets a config based on key and value system.');

        $f->h3('Paremeters');
        $f->parameter('key [_a-zA-Z\/]', 'Config key. Config is multidimensional array, so it is possible to go deeper in array by passing following key example "timing/enabled". Max 2 levels.');
        $f->parameter('value', 'Integer, float, string, array, object, null or bool.');

        $f->h3('Return Values');
        $f->p('This method does not have return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('config');
        $f->title('configExist');
        $f->h1('configExist');
        $f->note('DivHunt::configExist(string $key) : mix');
        $f->p('Checks if config exist with given key');

        $f->h3('Paremeters');
        $f->parameter('key [_a-zA-Z\/]', 'Config key. Config is multidimensional array, so it is possible to go deeper in array by passing following key example "timing/enabled". Max 2 levels.');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });