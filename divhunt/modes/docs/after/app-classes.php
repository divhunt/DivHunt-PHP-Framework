<?php

    /* 
     * Framework Load class
     */

    DivHunt::class('load')->from('divhunt/addons/classes');

    /* 
     * Framework Load class
     */

    DivHunt::class('qb')->from('divhunt/addons/classes');

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

    load::css('dh_libraries', DivHunt::getPath() . 'divhunt/addons/libraries', -1);
    load::js('dh_libraries', DivHunt::getPath() . 'divhunt/addons/libraries', -1);

    load::css('dh_blocks', DivHunt::getPath() . 'divhunt/addons/blocks', 1);
    load::js('dh_blocks', DivHunt::getPath() . 'divhunt/addons/blocks', 1);

    load::css('dh_modes', DivHunt::getPath() . 'divhunt/modes', 1);
    load::js('dh_modes', DivHunt::getPath() . 'divhunt/modes', 1);