<div class="dh-docs-heading-small">
        Blocks
</div>

<div class="dh-docs-page-sidebar">
    <?php foreach($page->blocks as $category => $block) { ?>
        
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&block=<?=$category?>" class="<?php if(route::var('block') == $category) { ?>active<?php } ?>">
            <?=str_replace('-', ' ', ucfirst($category))?>
        </a>

    <?php } ?>
</div>

<div class="mb20"></div>