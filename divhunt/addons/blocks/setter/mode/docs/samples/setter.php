<?php

    include template::use('setter', 'global', function($setter)
    {
        $setter->title('DivHunt - PHP Web Framework');
        $setter->description('DivHunt Framework is minimal, modular and extremely efficient framework for PHP');
        $setter->name('DivHunt');
        $setter->url(bind::getUrl());
    });