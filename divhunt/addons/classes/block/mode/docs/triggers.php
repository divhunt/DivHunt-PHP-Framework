<?php

    DivHunt::docsFunction($page, function($t)
    {
        $t->type('trigger');
        $t->title('block_load');
        $t->h1('block_load');
        $t->note('DivHunt::trigger("block_load")');
        $t->p('Runs trigger callback on block successfull load.');

        $t->h3('Callback Values');
        $t->parameter('object $block', 'Loaded block data.');
    });
