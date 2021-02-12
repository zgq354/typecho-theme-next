<?php

/**  
 * link    
 * @package custom   
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main id="main" class="main">
    <div class="main-inner">
        <div id="content" class="content">
            <div id="posts" class="posts-expand">
                <?php $this->content(); ?>
                <?php if (class_exists("Links_Plugin")) : ?>
                    <div class="links-of-author" style="margin-top:60px;">
                        <p style="margin: 0 0 10px 0;"><strong>友情链接</strong></p>
                        <?php Links_Plugin::output('<span class="links-of-author-item"><a href="{url}" title="{title}" target="_blank">{name}</a></span>'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
    <?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>
