<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is class Bind?');
        $s->note('DivHunt::class("bind")->from(DivHunt::getClassesPath(), true)');
        $s->p('Bind class helps you recognize easily domain name and based on provided configuration you may load site files. This type of settings allowing you to configure unlimited numbers of projects and domains on same framework files.');
        $s->note('Default supported TDLs (com, org, net, ai, info, dev, to)');
        $s->p('In order to support more TDLs, please construct class with additional parameters.');
        $s->code(__DIR__ . '/code/bind.php');
    });