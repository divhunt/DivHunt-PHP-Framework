<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getInsertID');
        $f->h1('getInsertID');
        $f->note('qb::getInsertID() : int');
        $f->p('Returns latest inserted row ID');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameter');

        $f->h3('Return Values');
        $f->p('Returns int');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getRegion');
        $f->h1('getRegion');
        $f->note('qb::getRegion() : string');
        $f->p('Returns currently active region.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameter');

        $f->h3('Return Values');
        $f->p('Returns string');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('setRegion');
        $f->h1('setRegion');
        $f->note('qb::setRegion(string $region) : bool');
        $f->p('Sets region to be used.');

        $f->h3('Paremeters');
        $f->parameter('region [a-zA-Z0-9]', 'Valid region name, usually 2 letters. Must match regex.');

        $f->h3('Return Values');
        $f->p('Returns bool');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('addRegion');
        $f->h1('addRegion');
        $f->note('qb::addRegion(string $region) : bool');
        $f->p('Adds new region.');

        $f->h3('Paremeters');
        $f->parameter('region [a-zA-Z0-9]', 'Valid region name, usually 2 letters. Must match regex.');

        $f->h3('Return Values');
        $f->p('Returns bool');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('existRegion');
        $f->h1('existRegion');
        $f->note('qb::existRegion(string $region) : bool');
        $f->p('Checks if region exist.');

        $f->h3('Paremeters');
        $f->parameter('region [a-zA-Z0-9]', 'Valid region name, usually 2 letters. Must match regex.');

        $f->h3('Return Values');
        $f->p('Returns bool');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('validType');
        $f->h1('validType');
        $f->note('qb::validType(string $type) : bool');
        $f->p('Checks if type is valid.');

        $f->h3('Paremeters');
        $f->parameter('type', 'Master or slave. This method is usually called when performing query to prevent user sending invalid type.');

        $f->h3('Return Values');
        $f->p('Returns bool');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getConnection');
        $f->h1('getConnection');
        $f->note('qb::getConnection(string $type) : mix');
        $f->p('Returns master or slave connection for active region if connection is established.');

        $f->h3('Paremeters');
        $f->parameter('type', 'Master or slave.');

        $f->h3('Return Values');
        $f->p('Returns MySQL connection or false.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('setConnection');
        $f->h1('setConnection');
        $f->note('qb::setConnection(string $type, object $connection) : void');
        $f->p('Sets MySQL connection for given type and active region.');

        $f->h3('Paremeters');
        $f->parameter('type', 'Master or slave.');
        $f->parameter('connection', 'MySQL Connection object.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('getDatabase');
        $f->h1('getDatabase');
        $f->note('qb::getDatabase(string $type) : array');
        $f->p('Returns one randomly picked database provided type');

        $f->h3('Paremeters');
        $f->parameter('type', 'Master or slave.');

        $f->h3('Return Values');
        $f->p('Array if databases are previously added, or false.');
    });