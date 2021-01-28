<div class="dh-docs-project-browse">
    <div class="dh-docs-heading-small">
        Browse Projects
    </div>

    <div class="grid col3 gap15">
        <?php foreach(DivHunt::docsGetProjects() as $project) { if($project->pages) { ?>
            <div class="project">
                <h3>
                    <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>">
                        <?=$project->title?>
                        <?php if($time = DivHunt::docsGetProjectTime($project)) { ?>
                            <span><i class="far fa-clock"></i> <?=$time?> min read</span>
                        <?php } ?>
                    </a>
                </h3>

                <p><?=$project->description?></p>

                <div class="tags">
                    <?php foreach($project->pages as $page) { ?>
                        <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>&page=<?=$page->slug?>" class="tag">#<?=$page->title?></a>
                    <?php } ?>
                </div>

                <div class="tar">
                    <a href="<?=route::getPath('docs')?>?mode=docs&project=<?=$project->slug?>" class="tar">
                        <div class="dh-docs-button1">Explore</div>
                    </a>
                </div>
            </div>
        <?php } } ?> 
    </div>
</div>