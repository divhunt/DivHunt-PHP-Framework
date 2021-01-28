<div class="page">
    <h3>
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>">
            <?=$page->title?>
            <?php if($page->time) { ?>
                <span><i class="far fa-clock"></i> <?=$page->time?> min read</span>
            <?php } ?>
        </a>
    </h3>

    <p><?=$page->description?></p>

    <div class="tags">
        <?php foreach($page->sections as $index => $section) { ?>
            <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&section=s<?=$index?>" class="tag">#<?=$section->title?></a>
        <?php } ?>
    </div>

    <div class="tar">
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>" class="tar">
            <div class="dh-docs-button1">Explore</div>
        </a>
    </div>
</div>