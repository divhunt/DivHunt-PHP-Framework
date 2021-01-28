<?php

    /**
     * Process block with mode AJAX
     */

    DivHunt::ajaxAddFile($_block->getPath() . 'ajax/block.php');

    /**
     * Check if block should be forced loade on any mode.
     */

    if($_block->shouldForce())
    {
        include 'app.php';
    }