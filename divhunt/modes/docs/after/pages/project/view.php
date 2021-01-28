<?php include block::use('main/navbar', 'docs')->load(); ?>

<div class="layout">
    <div class="left">
        <?php include block::use('project/sidebar', 'docs')->load(); ?>
    </div>
    <div class="right">
        <div class="content mt40">
            <div class="dh-docs-heading-big border">
                <h1><?=$project->title?></h1>
                <p><?=$project->description?></p>
            </div>

            <?php include block::use('page/browse', 'docs')->load(); ?>
        </div>
    </div>
</div>