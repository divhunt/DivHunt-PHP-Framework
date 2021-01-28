<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is class Block?');
        $s->note('DivHunt::class("block")->from(DivHunt::getClassesPath(), true)');
        $s->p('Blocks are HTML pieces of code that helping you to not repeat code as much. Blocks can be dynamic which means they can have options and data passed inside to be used.');
        $s->p('Each block may contain CSS, JS and Ajax code that will be automatically loaded.');
        $s->note('In order to write CSS & JS, create folders inside block ("js" and "css") and inside these folders create as many files needed ending with extension "css" or "js".');
        $s->note('In order to write AJAX code, create folder inside block ("ajax") and inside that folder create file "ajax.php", in that file you may write your ajax code which will be automatically loaded into "ajax" mode.');
        $s->code(__DIR__ . '/code/block.php');

        $s->h3('Paths');
        $s->p('Block class is giving you options to save predefined paths and reuse later.');
        $s->code(__DIR__ . '/code/paths.php');

        $s->h3('Data');
        $s->p('With calling blocks, you may pass as many data as needed, making your block dynamic and reusable.');
        $s->code(__DIR__ . '/code/data.php');
    });