<?php

    $categories = [];

    foreach($page->triggers as $trigger)
    {
        if($trigger->category && !in_array($trigger->category, $categories))
        {
            array_push($categories, $trigger->category);
        }
    }

?>

<div class="dh-docs-heading-small">
    Triggers
</div>

<div class="dh-docs-page-sidebar">
    <?php foreach($page->triggers as $index => $trigger) { if(!$trigger->category) { ?>
     
        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=t<?=$index?>" class="<?php if(route::var('function') == 't' . $index) { ?>active<?php } ?>">
            <?=$trigger->title?>
        </a>

    <?php } } ?>

    <?php foreach($categories as $category) { ?>
     
        <div class="category">
            <?=$category?>
        </div>  

        <?php foreach($page->triggers as $index => $trigger) { if($trigger->category == $category) { ?>
            <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>&function=t<?=$index?>" class="<?php if(route::var('function') == 't' . $index) { ?>active<?php } ?>">
                <?=$trigger->title?>
            </a>
        <?php } } ?>

    <?php } ?>
</div>

<div class="mb20"></div>

