<?php
    
    DivHunt::docsFunction($page, function($f)
    {
        $f->title('log');
        $f->h1('log');
        $f->note('DivHunt::log(string $text) : void');
        $f->p('Framework built in function for logging errors, notices and warnings. Using log function we can display errors, stop script execution, write to log file and more. This function is used across entire framework and on most classes.');

        $f->h3('Paremeters');
        $f->parameter('text', 'Text to log.');

        $f->h3('Additional Options');
        $f->parameter('->file(string $name) [a-zA-Z0-9_-]', 'Set log filename without extension if you would like to write log into file.');
        $f->parameter('->type(string $type = "error")', 'Set log type "fatal", "error", "warning" or "notice".');
        $f->parameter('->show(bool $show = false)', 'Set true to display error on page.');
        $f->parameter('->exit(bool $exit = false)', 'Set true to stop script futher execution.');
        $f->parameter('->scheme(string $scheme)', 'Set scheme for logging. Scheme adds additional info to log. Available schemes are "ip", "time", "uri", "bt1", "bt2", "bt3", "bt4" (BT => Backtrace).');

        $f->h3('Return Values');
        $f->p('Function does not have any return values.');

        $f->h3('Example #1');
        $f->code(__DIR__ . '/code/log.php');
    });