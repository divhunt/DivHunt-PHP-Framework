<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('canLogErrors');
        $f->h1('canLogErrors');
        $f->note('DivHunt::canLogErrors() : bool');
        $f->p('Returns true if framework can log errors.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('canLogWarnings');
        $f->h1('canLogWarnings');
        $f->note('DivHunt::canLogWarnings() : bool');
        $f->p('Returns true if framework can log warnings.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('canLogNotices');
        $f->h1('canLogNotices');
        $f->note('DivHunt::canLogNotices() : bool');
        $f->p('Returns true if framework can log notices.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });