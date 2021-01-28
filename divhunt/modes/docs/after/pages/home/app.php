<?php

    include block::use('setter', 'framework', function($setter)
    {
        $setter->wrap(false);
        $setter->title('DivHunt - PHP Web Framework');
        $setter->description('DivHunt Framework is minimal, modular and extremely efficient framework for PHP');
        $setter->name('DivHunt');
        $setter->fonts('https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap', '');
        $setter->fontawesome(true);
    });

    include block::use('global', 'framework')->load();
    include block::use('static', 'docs')->load();

