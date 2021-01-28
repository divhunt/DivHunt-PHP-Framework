<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->title('configure');
        $f->h1('configure');
        $f->note('DivHunt::configure(callable $callback) : string');
        $f->p('Configures DivHunt framework with additional options as logging, timing, path, password and more.');

        $f->h3('Paremeters');
        $f->parameter('callback', 'Use callback function to configure framework.');

        $f->h3('Callback Options');
        $f->parameter('->path(string $path = "/")', 'Set location of where is framework folder "divhunt" located based on configuration file path.');
        $f->parameter('->password(string $password = false)', 'Set password to prevent access to modes. Set null for no password.');
        $f->parameter('->develop(bool $develop = false)', 'Set develop mode on or off. Develop mode usually bybass cache and shows data in real time.');
        $f->parameter('->logging(bool $errors = false, bool $warnings = false, bool $notices = false)', 'Display or hide errors, warnings and notices.');
        $f->parameter('->timing(bool $enabled = false, int $limit = false, bool $show = false)', 'Enable or disable timing. Timing records time from start to end of your application, set limit to keep track if you application takes longer than specified, and set show to true to echo time needed to execute entire script.');

        $f->h3('Return Values');
        $f->p('Function returns string, path to divhunt/run.php file if configured properly, otherwise path to divhunt/checks.php file where error will appear that framework is not configured properly.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/configure-full.php');
    });