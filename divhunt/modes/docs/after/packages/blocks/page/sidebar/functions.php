<?php

    $categories = [];

    foreach($page->functions as $function)
    {
        if($function->category && !in_array($function->category, $categories))
        {
            array_push($categories, $function->category);
        }
    }

?>

<div class="dh-docs-heading-small">
    Functions
</div>

<div class="dh-docs-page-sidebar">
    <?php foreach($page->functions as $index => $function) { if(!$function->category) { ?>
     
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=f<?=$index?>" class="<?php if(route::var('function') == 'f' . $index) { ?>active<?php } ?>">
            <?=$function->title?>
        </a>

    <?php } } ?>

    <?php foreach($categories as $category) { ?>
     
        <div class="category">
            <?=$category?>
        </div>  

        <?php foreach($page->functions as $index => $function) { if($function->category == $category) { ?>
            <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=f<?=$index?>" class="<?php if(route::var('function') == 'f' . $index) { ?>active<?php } ?>">
                <?=$function->title?>
            </a>
        <?php } } ?>

    <?php } ?>
</div>

<div class="mb20"></div>

