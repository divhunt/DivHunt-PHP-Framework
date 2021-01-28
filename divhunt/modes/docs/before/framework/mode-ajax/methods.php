<?php

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxExit');
        $f->h1('ajaxExit');
        $f->note('DivHunt::ajaxExit(bool $success, string $message, array $data) : void');
        $f->p('Exiting "Ajax" mode with json_encode() and exit. Using this method is recommended as method cotains trigger "ajax_exit".');

        $f->h3('Paremeters');
        $f->parameter('success', 'True or false.');
        $f->parameter('message', 'Any message to be returned.');
        $f->parameter('data', 'Additional data can be passed with array.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxGetFiles');
        $f->h1('ajaxGetFiles');
        $f->note('DivHunt::ajaxGetFiles() : array');
        $f->p('Returns all injected files (paths) that will be included into "Ajax" mode.');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxAddFile');
        $f->h1('ajaxAddFile');
        $f->note('DivHunt::ajaxAddFile(string $path) : void');
        $f->p('Inject file path to be included into "Ajax" mode.');

        $f->h3('Paremeters');
        $f->parameter('path', 'Absolute path to the file.');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxGetOrigins');
        $f->h1('ajaxGetOrigins');
        $f->note('DivHunt::ajaxGetOrigins() : array');
        $f->p('Returns all added origins (hosts).');

        $f->h3('Paremeters');
        $f->p(false, 'no-method-parameters');

        $f->h3('Return Values');
        $f->p('Returns array.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxAddOrigin');
        $f->h1('ajaxAddOrigin');
        $f->note('DivHunt::ajaxAddOrigin(string ...$origin) : void');
        $f->p('Add as many origins (hosts) seperated by comma. Origins are being checked before accessing "Ajax" mode.');

        $f->h3('Paremeters');
        $f->parameter('origin', 'Splat operator - Send as many origins as needed. Set "*" to skip checking origins (match any).');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxGetCreditials');
        $f->h1('ajaxGetCreditials');
        $f->note('DivHunt::ajaxGetCreditials(string $type) : array');
        $f->p('Get added creditials for "POST" or "GET". Creditials are being checked before accessing "Ajax" mode.');

        $f->h3('Paremeters');
        $f->parameter('type', '"POST" or "GET".');

        $f->h3('Return Values');
        $f->p('Returns array with key => value.');
    });

    DivHunt::docsFunction($page, function($f)
    {
        $f->type('method');
        $f->title('ajaxAddCreditial');
        $f->h1('ajaxAddCreditial');
        $f->note('DivHunt::ajaxAddCreditial(string $type, string $key, string $value) : void');
        $f->p('Adds new creditial for checks.');

        $f->h3('Paremeters');
        $f->parameter('type', '"POST" or "GET".');
        $f->parameter('key', 'Creditial name .');
        $f->parameter('value', 'Creditial value .');

        $f->h3('Return Values');
        $f->p('This method does not have any return value.');
    });