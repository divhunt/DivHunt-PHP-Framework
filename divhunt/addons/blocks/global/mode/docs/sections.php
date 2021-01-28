<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is block Global?');
        $s->note('include block::use("global")->from("/divhunt/addons/packages/blocks/");');
        $s->p('Global block is default block that is loaded typically in modes "Docs" and "Develop" that contains general CSS styles, JS Libraries and similar.');
        $s->p('List of everything that is included within this block can be found on right sidebar.');
    });

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Libraries');
        $s->h1('Loaded Libraries');
        $s->note('jquery.js');
        $s->note('gsap.js');
        $s->note('highlight.js');
        $s->note('interact.js');
        $s->note('sortable.js');
    });