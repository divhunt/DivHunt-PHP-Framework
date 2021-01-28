<?php

    $categories = [];

    foreach($project->pages as $page)
    {
        if($page->category && !in_array($page->category, $categories))
        {
            array_push($categories, $page->category);
        }
    }

?>

<div class="dh-docs-page-browse">
    
    <div class="grid col3 gap15 mb30">
        <?php foreach($project->pages as $page) { if(!$page->category) { ?>
            <?php include 'page.php'; ?>
        <?php } } ?>
    </div>

    <?php foreach($categories as $category) { ?>
        <div class="category">
            <?=$category?>
        </div>  

        <div class="grid col3 gap15 mb30">
            <?php foreach($project->pages as $page) { if($page->category == $category) { ?>
                <?php include 'page.php'; ?>
            <?php } } ?>
        </div>
    <?php } ?> 

    <?php if(!$project->pages) { ?>
        <h3>This project doesn't have any pages yet.</h3>
    <?php } ?>

</div>