<?php

    $categories = [];

    foreach($page->methods as $method)
    {
        if($method->category && !in_array($method->category, $categories))
        {
            array_push($categories, $method->category);
        }
    }

?>

<div class="dh-docs-heading-small">
    Methods
</div>

<div class="dh-docs-page-sidebar">
    <?php foreach($page->methods as $index => $method) { if(!$method->category) { ?>
     
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=m<?=$index?>" class="<?php if(route::var('function') == 'm' . $index) { ?>active<?php } ?>">
            <?=$method->title?>
        </a>

    <?php } } ?>

    <?php foreach($categories as $category) { ?>
     
        <div class="category">
            <?=$category?>
        </div>  

        <?php foreach($page->methods as $index => $method) { if($method->category == $category) { ?>
            <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=m<?=$index?>" class="<?php if(route::var('function') == 'm' . $index) { ?>active<?php } ?>">
                <?=$method->title?>
            </a>
        <?php } } ?>

    <?php } ?>
</div>

<div class="mb20"></div>

