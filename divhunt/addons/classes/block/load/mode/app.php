<?php

    /**
     * Process block with mode APP
     */

    if($_block->canWrap())
    {
        echo '<block ' . implode(' ', $_block->getAttributes()) . '>';
    }

    include $_block->getPath() . 'block.php';

    if($_block->canWrap())
    {
        echo '</block>';
    }