<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
Typecho_Widget::widget('Widget_Stat')->to($stat);
?>
<div class="sidebar-toggle">
    <div class="sidebar-toggle-line-wrap">
      <span class="sidebar-toggle-line sidebar-toggle-line-first"></span>
      <span class="sidebar-toggle-line sidebar-toggle-line-middle"></span>
      <span class="sidebar-toggle-line sidebar-toggle-line-last"></span>
  </div>
</div>

<aside id="sidebar" class="sidebar">
    <div class="sidebar-inner">
      <section class="site-overview">
        <div class="site-author motion-element" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <img class="site-author-image" src="<?php echo getGravatar($this->options->next_gravatar,160); ?>" alt="<?php $this->options->next_name(); ?>" itemprop="image"/>
          <p class="site-author-name" itemprop="name"><?php $this->options->next_name(); ?></p>
      </div>
      <p class="site-description motion-element" itemprop="description"><?php $this->options->next_tips(); ?></p>
      <nav class="site-state motion-element">
          <div class="site-state-item site-state-posts">
            <a href="<?php echo Typecho_Router::url('page',array('slug' => 'archive'),$this->options->index);?>">
              <span class="site-state-item-count"><?php echo $stat->publishedPostsNum;?></span>
              <span class="site-state-item-name">日志</span>
          </a>
      </div>

      <div class="site-state-item site-state-categories">
        <a href="<?php echo Typecho_Router::url('page',array('slug' => 'categories'),$this->options->index);?>">
          <span class="site-state-item-count"><?php echo $stat->categoriesNum;?></span>
          <span class="site-state-item-name">分类</span>
</a>
      </div>

      <div class="site-state-item site-state-tags">
          <span class="site-state-item-count"><?php echo $stat->publishedPagesNum;?></span>
          <span class="site-state-item-name">页面</span>
  </div>
</nav>
<?php if(!empty($this->options->search_form) && in_array('ShowFeed', $this->options->search_form)): ?>
          <div class="feed-link motion-element">
            <a href="<?php $this->options->feedUrl(); ?>" rel="alternate">
              <i class="menu-item-icon icon-next-feed"></i>
              RSS
            </a>
          </div>
<?php endif;?>
<div class="links-of-author motion-element">
</div>
<?php if (class_exists("Links_Plugin")): ?>
  
<div class="links-of-author motion-element">
    <p class="" style="margin-bottom: 12px;"><strong>友情链接</strong></p>
    <?php Links_Plugin::output('<span class="links-of-author-item"><a href="{url}" title="{title}" target="_blank">{name}</a></span>'); ?>
</div>
    <?php endif; ?>
</section>
<?php if ($this->is('post')): ?>
<section class="post-toc-wrap sidebar-panel-active">
          <div class="post-toc-indicator-top post-toc-indicator"></div>
          <div class="post-toc">
            <p class="post-toc-empty">此文章未包含目录</p>
          </div>
</section>
<?php endif;?>   
</div>
</aside>

