<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('Function: Trigger');
        $s->p('Function trigger allows you to insert any piece of code into trigger callbacks. There are more than 10 trigger callbacks already, and possibility for anyone to create more triggers at any time and place.');
        $s->note('Triggers must be initiated before trigger callbacks. Place triggers as high as possible in your project while keeping packages you need.');
    });