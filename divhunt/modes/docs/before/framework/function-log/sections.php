<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('Function: Log');
        $s->p('Framework comes with built-in function log. Log helps you show errors easily if something is wrong or missing. There are several types of logs including "fatals", "errors", "warnings" and "notices".');

        $s->h3('Fatals');
        $s->p('This is hardest type of log. If fatal occurs, log will stop futher script execution and display log. Framework will not load any mode (if not loaded), and if loaded, will stop it.');

        $s->h3('Errors');
        $s->p('Same applies as fatals, just in this case, framework will try to force loading develop mode where all logs will be shown.');

        $s->h3('Warnings & Notices');
        $s->p('Logs that usually can be ignored at the time and to be fixed later. Only way to see warnings & notices is from develop mode.');
    });