<?php

    /* 
     * Documentation routes
     */

    route::setPath('docs', DivHunt::getURI()->string);

    include route::get('~docs/?project/?page/?section/?function/?block', function($r)
    {
        if(route::var('project') && route::var('page') && route::var('block'))
        {
            $r->load('pages/block', true);
        }
        else if(route::var('project') && route::var('page') && route::var('section'))
        {
            $r->load('pages/section', true);
        }
        else if(route::var('project') && route::var('page') && route::var('function'))
        {
            $r->load('pages/function', true);
        }
        else if(route::var('project') && route::var('page'))
        {
            $r->load('pages/page', true);
        }
        else if(route::var('project'))
        {
            $r->load('pages/project', true);
        }
        else
        {
            $r->load('pages/home', true);
        }
    });
