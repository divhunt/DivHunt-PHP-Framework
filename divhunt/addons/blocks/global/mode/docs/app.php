<?php

	$page = DivHunt::docsPage('framework', function($p)
    {
        $p->title('Block: Global')->slug('block-global')->category('Blocks');
        $p->description('CSS Predefines. JavaScript Libraries, Classes and Functions.')->time(10);
    });

    include 'sections.php';
    include 'blocks.php';
