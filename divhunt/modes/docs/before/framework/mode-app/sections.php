<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is "App" mode?');
        $s->p('"App" mode is default framework mode than renders HTML and displays in on the page along with static files as images, css and javascript. This mode does not have any additional configuration, methods or even functions.');

        $s->note('GET site.com');
        $s->note('POST site.com');
    });