<?php

    /* 
     * Framework Load class
     */

    DivHunt::class('load')->from('divhunt/addons/classes');

    /* 
     * Framework Route class
     */

    DivHunt::class('route')->from('divhunt/addons/classes');

    /* 
     * Framework Block class
     */

    DivHunt::class('block')->from('divhunt/addons/classes');

    /* 
     * Block class and default paths
     */

    block::setPath('framework', '/divhunt/addons/blocks/');
    block::setPath('docs', '/divhunt/modes/docs/after/packages/blocks/');

    /* 
     * Load static files
     */

    load::css('docs', DivHunt::getPath() . 'divhunt', 1);
    load::js('docs', DivHunt::getPath() . 'divhunt', 1);