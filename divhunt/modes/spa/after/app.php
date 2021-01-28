<?php

    /**
     * Load type: SPA - After
     * Default load type which renders html into webpage
     *
     * @see https://divhunt.com/docs
     */

    $html = ob_get_clean();
    header('Content-type: application/json');

    DivHunt::spaKey($html, 'page');
    DivHunt::spaExit();