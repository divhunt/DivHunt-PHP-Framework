<?php
    
    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('timing');
        $f->title('isTimingEnabled');
        $f->h1('isTimingEnabled');
        $f->note('DivHunt::isTimingEnabled() : bool');
        $f->p('Returns true if framework timing is enabled.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('timing');
        $f->title('canShowTiming');
        $f->h1('canShowTiming');
        $f->note('DivHunt::canShowTiming() : bool');
        $f->p('Returns true if framework  can display timing.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('timing');
        $f->title('getTimingLimit');
        $f->h1('getTimingLimit');
        $f->note('DivHunt::getTimingLimit() : int');
        $f->p('Returns maximum execution time limit.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns int. Can return false if timing is not enabled.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('timing');
        $f->title('getTimingStart');
        $f->h1('getTimingStart');
        $f->note('DivHunt::getTimingStart() : float');
        $f->p('Returns framework start time (microtime(true)).');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns microtime(true) float. (' . DivHunt::getTimingStart() . ')');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->category('timing');
        $f->title('getTimingEnd');
        $f->h1('getTimingEnd');
        $f->note('DivHunt::getTimingEnd() : float');
        $f->p('Returns total MS difference between getFrameworkStart() and now.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns float. (' . DivHunt::getTimingEnd() . 'ms)');
    });