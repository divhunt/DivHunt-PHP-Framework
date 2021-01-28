<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('use');
        $f->h1('use');
        $f->note('block::use(string $name, string $path = false, $callback = false) : string | object');
        $f->p('Includes block file, process all static files and ajax if added.');

        $f->h3('Paremeters');
        $f->parameter('name', 'Block name.');
        $f->parameter('path', 'Block path, set either realtive path from framework configuration or predefined path key.');
        $f->parameter('callback', 'Returns object (class).');

        $f->h3('Object (class) & Callback Options');
        $f->parameter('->id(string $id)', 'Set block wrap tag ID.');
        $f->parameter('->class(string $class)', 'Set block wrap tag class.');
        $f->parameter('->wrap(bool $wrap = true)', 'Set true to ignore wrapping block into tag.');
        $f->parameter('->any_key($any_value)', 'You may pass any key - value to be accessed inside block.');

        $f->h3('Inside Block Data Access');
        $f->p('You may access all data inside block using $_block variable. Here are some of data you can get.');
        $f->parameter('->getName() : string', 'Returns block name.');
        $f->parameter('->getPath() : string', 'Returns block path.');
        $f->parameter('->getInditifier() : string', 'Returns block unique ID.');
        $f->parameter('->getClass() : string', 'Returns block wrap tag class if set.');
        $f->parameter('->getID() : string', 'Returns block wrap tag ID if set.');
        $f->parameter('->canWrap() : bool', 'Returns bool if block can wrap.');
        $f->parameter('->getAttributes() : array', 'Returns wrap tag attributes.');
        $f->parameter('->get(string $key) : mix', 'Gets data from key, if key is previously set.');

        $f->h3('Return Values');
        $f->p('Function returns object if no callback is passed, otherwise returns string, path for block to be included.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/use.php');
    });