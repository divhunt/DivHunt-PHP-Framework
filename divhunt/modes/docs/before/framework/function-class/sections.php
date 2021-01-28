<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('Function: Class');
        $s->p('Classes are invidual pieces of codes that can grow functionality of framework. There are many official classes and hopefully soon 3rd party ones. Framework comes with built-in function class that helps you include and use classes simplified, create instance and construct them as many times as needed.');

        $s->p('This function is important because including classes is not the only thing that it does, beside that, there are hooks ("run", "activate"), that does all the sort of checks and more. There are modes, each class can be runned differently on each mode, for example class can have its own "docs" mode that can contain code for writting documentation, which means including some class will automatically include all documentation for it.');
    });