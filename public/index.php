 <?php

    /**
     * DivHunt Framework - The only good thing that it comes with you, wherever you go!
     * Copyright (c) DivHunt (https://divhunt.com)
     *
     * Licensed under The MIT License
     * For full copyright and license information, please see the LICENSE.txt
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright Copyright (c) DivHunt (https://divhunt.com)
     * @link      https://framework.divhunt.com/ DivHunt Project
     * @license   https://opensource.org/licenses/mit-license.php MIT License
     */

    require '../divhunt/app.php';

    include DivHunt::configure(function($divhunt)
    {
    	$divhunt->path('../');
        $divhunt->logging(true, true, true);
    	$divhunt->develop(true);
    });

    if(get('mode') !== 'docs')
    {
        DivHunt::reload('/?mode=docs');
    }