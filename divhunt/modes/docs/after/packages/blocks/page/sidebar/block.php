<?php
    
    if($page->functions)
    {
        include 'functions.php';
    }

    if($page->methods)
    {
        include 'methods.php';
    }

    if($page->triggers)
    {
        include 'triggers.php';
    }

    if($page->blocks)
    {
        include 'blocks.php';
    }