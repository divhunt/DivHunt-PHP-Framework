<?php

    /**
     * Load type: Develop - After
     * Default load type which renders html into webpage
     *
     * @see https://divhunt.com/docs
     */

    ob_get_clean();
    flush();
    
    print_r(DivHunt::getModeData());