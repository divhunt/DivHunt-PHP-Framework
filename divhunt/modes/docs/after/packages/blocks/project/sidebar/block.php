<div class="dh-docs-project-sidebar">

    <?php $i = 0; foreach($project->pages as $_page) { $i++; ?>
        <div class="page">
            <a class="<?php if(route::var('page') == $_page->slug) { ?>active<?php } ?>" href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$_page->slug?>"><?=$_page->title?></a>

            <?php foreach($_page->sections as $index => $_section) { ?>
                <a class="sub <?php if(route::var('section') == 's' . $index && route::var('page') == $_page->slug) { ?>active<?php } ?>" href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$_page->slug?>&section=s<?=$index?>"><?=$_section->title?></a>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="mt20"></div>

    <?php if($page ?? false) { ?>
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>" class="return">
            <i class="fas fa-chevron-left"></i> Back to <?=$project->title?>
        </a>
    <?php } ?>

    <a href="<?=route::getPath('docs')?>?mode=docs" class="return">
        <i class="fas fa-chevron-left"></i> Back to Projects
    </a>
</div>