<?php

    // DivHunt

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('divhunt');
            $b->title('Variables');
            $b->code(__DIR__ . '/block/divhunt/variables.php', true);
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('divhunt');
            $b->title('Logo');
            $b->code(__DIR__ . '/block/divhunt/logo.php');
        });

    // CSS

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Background');
            $b->code(__DIR__ . '/block/global/backgrounds.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Colors');
            $b->code(__DIR__ . '/block/global/colors.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Text');
            $b->code(__DIR__ . '/block/global/text.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Paddings');
            $b->code(__DIR__ . '/block/global/paddings.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Margins');
            $b->code(__DIR__ . '/block/global/margins.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Content');
            $b->code(__DIR__ . '/block/global/content.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Border Radious');
            $b->code(__DIR__ . '/block/global/border-radius.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Grid');
            $b->code(__DIR__ . '/block/global/grid.php');
        });

        DivHunt::docsBlock($page, function($b)
        {
            $b->category('global');
            $b->title('Flex');
            $b->code(__DIR__ . '/block/global/flex.php');
        });