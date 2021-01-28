<?php

    /**
     * Process block with mode APP
     */

    $include = false;
    $exclude = false;

    if($include = post('include', false))
    {
        if(!is_array($include))
        {
            $include = false;
        }
    }

    if($include)
    {
        if(in_array($_block->getIdentifier(), $include))
        {
            ob_start(); include $_block->getPath() . 'block.php'; $html = ob_get_clean();

            DivHunt::spaKey($html, 'blocks', $_block->getIdentifier());
        }
    }
    else
    {
        if($_block->canWrap())
        {
            echo '<block ' . implode(' ', $_block->getAttributes()) . '>';
        }

        include $_block->getPath() . 'block.php';

        if($_block->canWrap())
        {
            echo '</block>';
        }
    } 