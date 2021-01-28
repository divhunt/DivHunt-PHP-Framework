<?php

    /* 
     * Route class
     */

    DivHunt::class('route')->from(DivHunt::getClassesPath(), true);

    /* 
     * Block class and default paths
     */

    DivHunt::class('block')->from(DivHunt::getClassesPath(), true);
    block::setPath('framework', '/divhunt/addons/blocks/');
    block::setPath('docs', '/divhunt/modes/docs/after/packages/blocks/');
