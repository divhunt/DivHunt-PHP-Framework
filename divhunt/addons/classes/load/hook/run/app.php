<?php

	if(!is_writable(load::getLoadPath()))
    {
        DivHunt::log('Load public folder is not writeable. Please make sure to set right permisions at "' . load::getLoadPath() . '" location.')->type('fatal')->log(); 
    }