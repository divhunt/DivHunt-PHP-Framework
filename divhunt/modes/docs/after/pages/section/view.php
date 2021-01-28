<?php include block::use('main/navbar', 'docs')->load(); ?>

<div class="layout">
    <div class="left">
        <?php include block::use('project/sidebar', 'docs')->load(); ?>
    </div>
    <div class="right">
        <div class="content mt40">
            <div class="dh-docs-project">
                <div class="dh-docs-heading-big border">
                    <h1><?=$page->title?></h1>
                    <p><?=$page->description?></p>
                </div>
            </div>

            <?php if($page->functions || $page->methods || $page->blocks) { ?>
                <div class="flex">
                    <div class="main">
                        <?php include block::use('page/elements', 'docs')->elements($section->elements)->load(); ?>
                    </div>

                    <div class="sidebar">
                        <?php include block::use('page/sidebar', 'docs')->load(); ?>
                    </div>
                </div>
            <?php } else { ?>
                <?php include block::use('page/elements', 'docs')->elements($section->elements)->load(); ?>
            <?php } ?>
        </div>
    </div>
</div>