<?php

/**
 * tags
 * @package custom
 */
Typecho_Widget::widget('Widget_Stat')->to($stat);
$this->need('header.php'); ?>
<main id="main" class="main">
    <div class="main-inner">
        <div class="content-wrap">
            <div id="content" class="content">
                <div id="posts" class="posts-expand">
                    <div class="tag-cloud">
                        <div class="tag-cloud-title">
                            目前共计 <?php echo getTagCount(); ?> 个标签
                            <div class="tag-cloud-tags">
                                <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=50')->to($tags); ?>
                                <?php while ($tags->next()) : ?>
                                    <a href="<?php $tags->permalink(); ?>" rel="tag" class="tag-size-<?php $tags->split(1, 5, 10, 15); ?>" title="<?php $tags->count(); ?> 篇文章">
                                        <?php $tags->name(); ?>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->need('sidebar.php'); ?>
    </div>
</main>
<?php $this->need('footer.php'); ?>
