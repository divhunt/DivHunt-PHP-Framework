<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('About');
        $s->h1('What is Ajax Mode?');
        $s->p('Performing actions without refreshing page is possible thanks to Ajax. "Ajax" mode simplifies this actions to the lowest and allowing to perform ajax actions anywhere and anytime without having to worry about what route you need to hit or having to do additional checks. Every variable, function or class that you have in-app is accessible inside "Ajax" mode by default.');

        $s->note('GET site.com?mode=ajax');
        $s->note('POST site.com mode=ajax');

        $s->h3('How it works?');
        $s->p('Ajax default response is array with "success" and "info" keys. In order to add pieces of code into "Ajax" you must inject file path that will be included in "Ajax" mode. Using "Ajax" mode method DivHunt::ajaxAdd() you can push as many files as you want, those files will be automatically loaded into "Ajax".');
        $s->code(__DIR__ . '/code/response.php');
    });

     DivHunt::docsSection($page, function($s)
    {
        $s->title('Origins & Creditials');
        $s->h1('Origins & Creditials');
        $s->note('Using origins & creditials you can harden your "Ajax" mode.');

        $s->h3('Origins');
        $s->p('Adding origin will prevent accessing "Ajax" mode from other sites or tools, so it is good practice to add only your origins. If added, "Ajax" mode will become accessible only from added origins, which means only from your site directly. Using method ajaxAddOrigin() you can add as many origins to be checked before accessing "Ajax" mode.');

        $s->h3('Creditials');
        $s->p('Secure your "Ajax" mode even more with creditials. Using method ajaxAddCreditial() you can add GET or POST creditials to be required and exactly matched before they can acccess mode. This is also one way to create APIs also prevent or give access to someone by their unique API secret or similar.');
    });