<?php $elements = (array) $_block->get('elements', []); ?>

<div class="dh-docs-page-section">
    <?php foreach($elements as $tags) { foreach($tags as $tag => $content) { ?>
        <div class="<?=$tag?>"><?=$content?></div>
    <?php } } ?>
</div>

