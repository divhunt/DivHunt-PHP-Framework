<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getTdls');
        $f->h1('getTdls');
        $f->note('bind::getTdls() : array');
        $f->p('Returns supported TDLs.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getTdl');
        $f->h1('getTdl');
        $f->note('bind::getTdl() : string');
        $f->p('Get current domain TDL based on host.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getDomain');
        $f->h1('getDomain');
        $f->note('bind::getDomain() : string');
        $f->p('Get current domain name based on host.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getSubdomain');
        $f->h1('getSubdomain');
        $f->note('bind::getSubdomain() : string');
        $f->p('Get current subdomain name based on host.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getUrl');
        $f->h1('getUrl');
        $f->note('bind::getUrl() : string');
        $f->p('Get full domain url (with http/s).');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getUri');
        $f->h1('getUri');
        $f->note('bind::getUri() : string');
        $f->p('Get URI (domain excluded) without GET paremeters.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns string.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('isHttps');
        $f->h1('isHttps');
        $f->note('bind::isHttps() : bool');
        $f->p('Returns true if connection is secured, or false if not.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('isBinded');
        $f->h1('isBinded');
        $f->note('bind::isBinded() : bool');
        $f->p('Returns true if domain is binded or false if not.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns bool.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getBinded');
        $f->h1('getBinded');
        $f->note('bind::getBinded() : object');
        $f->p('Returns domain object if domain is binded.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });