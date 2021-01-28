<?php
    
    DivHunt::docsFunction($page, function($f)
    {
        $f->title('class');
        $f->h1('class');
        $f->note('DivHunt::class(string $name, ...$data)->instance(bool $instance = false)->from(string $path, bool $direct_path) : mix');
        $f->p('Function includes class file and construct it, returns instance if needed.');

        $f->h3('Paremeters');
        $f->parameter('name [a-zA-Z0-9_]', 'Class name.');
        $f->parameter('data', 'Pass as many data seperated by comma as needed for construct.');
        $f->parameter('instace', '*Optional. If true, class will be instanced. This whole method can be skipped.');
        $f->parameter('path', 'Relative path based on framework configuration - example "/classes", or absolute path - example "__DIR__ . "/classes".');
        $f->parameter('direct_path', 'Set to true only if $path is absolute.');

        $f->h3('Return Values');
        $f->p('Function does not have any return values if instance is set to false, otherwise returns class object.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/class.php');
    });