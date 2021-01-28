<?php
    
    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is DivHunt PHP Framework?');
        $s->p('DivHunt Framework is modular and extremely efficient framework for PHP. It can be used as only tool for building entire small or enterprise websites, as well as a small tool loaded into every PHP project to bring additional possibilities. DivHunt company goal is to bring all necessary packages available to anyone free of charge for building modern, cutting-edge websites and applications with not limitations what so ever.');

        $s->p('Framework comes with zero packages loaded, meaning you have to choose what to load and where, forcing you to use only what you really need at time and place when you need it.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Modes');
        $s->h1('Framework Modes');
        $s->p('DivHunt framework can be runned in 6 different ways, that ways are called modes. One of them is "docs" mode, mode that you are currently running on, while remaining 5 ones are "app", "ajax", "spa", "build" and "develop".');

        $s->h3('How Modes works?');
        $s->p('Each mode has before and after files. When you enter "docs" mode, before everything, framework will load "docs" before files, where certain things will be executed, after that, your application will be processed, and again after that, framework will load "docs" after files where entire documentation will be shown along with html, css and js.');

        $s->h3('Entering Mode');
        $s->p('Entering mode is possible from one out of to ways, by simple passing data to $_GET or $_POST request, with key "mode" followed with mode name.');
        $s->note('GET site.com?mode=ajax');
        $s->note('POST site.com mode=ajax');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Requirements');
        $s->h1('Requirements');
        $s->note('PHP Version >= 7.2 required.');
        $s->p('What makes this framework stands apart from others is that no additional requirements are neccessary to run framework and build amazing and advanced next-gen projects, making it easy and lightewight, however while using additional classes to grow functionality of framework, those packages may ask for additional requirements.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Configuration');
        $s->h1('Configuration');
        $s->p('Get started by requiring framework class and configuring it.');
        $s->code(__DIR__ . '/code/configure.php');
    });