<?php

    DivHunt::docsSection($page, function($s)
    {
        $s->title('Query Builder');
        $s->h1('What is Query Builder');
        $s->note('DivHunt::class("qb")->from("divhunt/packages/classes")');
        $s->p('Query Builders allows you to add multiple databases including master and slaves along with multiple regions. Beyond that it simplifies for you query actions such as selects, inserts, deletes and updated.');
        $s->code(__DIR__ . '/code/qb.php');

        $s->h3('Regions');
        $s->p('Using Query Builder you can add as many regions as needed with constructing the class. Each region can have its own master and slave connections, but only 1 region can be used at same time along with only 1 master and 1 slave per site load.');
        $s->p('Regions can be set manually using method setRegion() or automatically by detecting region from IP or some other method.');
        $s->code(__DIR__ . '/code/regions.php');

        $s->h3('Master & Slaves');
        $s->p('Adding masters and slaves is possible. Master is required while slave is optional, if not provided, master will be used.');
        $s->note('Insert, Update and Delete always use "Master", while Select by default use "Slave" unless otherwise specified.');
        $s->p('Multiple masters and slaves can be added for each region, however only 1 master and 1 slave will be randomly choosed on each request.');
        $s->code(__DIR__ . '/code/master-slaves.php');
        $s->warning('Keep in mind that connection wont be established until first query is performed, or function connection() called.');
    });