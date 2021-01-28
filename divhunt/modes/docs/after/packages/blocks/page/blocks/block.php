<div class="dh-docs-page-blocks">
    <?php foreach($blocks as $block) { ?>
        <div class="block <?php if($block->hide_html) { ?>code<?php } ?>">
            <h3>
                <?=$block->title?>
                <?php if(!$block->hide_html) { ?>
                    <i class="fas fa-code" onclick="$(this).parent().parent().toggleClass('code')"></i>    
                <?php } ?>
            </h3>
            <div class="code">
                <?php if($block->hide_html) { ?>
                    <pre><code class="language-html"><?=htmlspecialchars($block->code, ENT_QUOTES)?></code></pre>
                    <script>hljs.initHighlightingOnLoad();</script>
                <?php } else { ?>
                    <div class="clean"><?=$block->code?></div>
                    <pre style="display: none"><code class="language-html"><?=htmlspecialchars($block->code, ENT_QUOTES)?></code></pre>
                    <script>hljs.initHighlightingOnLoad();</script>
                <?php } ?> 
            </div>
        </div>
    <?php } ?>
</div>