<?php

    DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getPath');
            $f->h1('getPath');
            $f->note('DivHunt::getPath() : string');
            $f->p('Returns framework folder directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });

        DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getAddonsPath');
            $f->h1('getAddonsPath');
            $f->note('DivHunt::getAddonsPath() : string');
            $f->p('Returns framework addons folder directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });

        DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getLogsPath');
            $f->h1('getLogsPath');
            $f->note('DivHunt::getLogsPath() : string');
            $f->p('Returns framework logs folder directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });

        DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getClassesPath');
            $f->h1('getClassesPath');
            $f->note('DivHunt::getClassesPath() : string');
            $f->p('Returns framework classes folder directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });

        DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getBlocksPath');
            $f->h1('getBlocksPath');
            $f->note('DivHunt::getBlocksPath() : string');
            $f->p('Returns framework blocks folder directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });

        DivHunt::docsFunction($page, function($f)
        {
            $f->type('method');
            $f->category('paths');
            $f->title('getPublicPath');
            $f->h1('getPublicPath');
            $f->note('DivHunt::getPublicPath() : string');
            $f->p('Returns public directory path.');

            $f->h3('Paremeters');
            $f->p(false, 'no-method-parameters');

            $f->h3('Return Values');
            $f->p('Returns string.');
        });