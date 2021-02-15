<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
Typecho_Widget::widget('Widget_Stat')->to($stat);
?>
<div class="toggle sidebar-toggle toggle-close">
  <span class="toggle-line toggle-line-first"></span>
  <span class="toggle-line toggle-line-middle"></span>
  <span class="toggle-line toggle-line-last"></span>
</div>
<aside class="sidebar">
  <div class="sidebar-inner">
    <ul class="sidebar-nav motion-element">
      <li class="sidebar-nav-toc">
        Table of Contents
      </li>
      <li class="sidebar-nav-overview">
        Overview
      </li>
    </ul>
    <div class="post-toc-wrap sidebar-panel">
      <!-- TODO: 完善文章页目录的样式 -->
      <?php if ($this->is('post')) : ?>
        <section class="post-toc-wrap sidebar-panel-active">
          <div class="post-toc-indicator-top post-toc-indicator"></div>
          <div class="post-toc">
            <p class="post-toc-empty">此文章未包含目录</p>
          </div>
        </section>
      <?php endif; ?>
    </div>
    <section class="site-overview-wrap sidebar-panel <?php if (!$this->is('post')) echo "sidebar-panel-active"; ?>">
      <div class="site-author motion-element" itemprop="author" itemscope itemtype="http://schema.org/Person">
        <img class="site-author-image" src="<?php echo getGravatar($this->options->next_gravatar, 160); ?>" alt="<?php $this->options->next_name(); ?>" itemprop="image" />
        <p class="site-author-name" itemprop="name"><?php $this->options->next_name(); ?></p>
        <p class="site-description motion-element" itemprop="description"><?php $this->options->next_tips(); ?></p>
      </div>
      <div class="site-state-wrap motion-element">
        <nav class="site-state">
          <div class="site-state-item site-state-posts">
            <a href="<?php echo Typecho_Router::url('page', array('slug' => 'archive'), $this->options->index); ?>">
              <span class="site-state-item-count"><?php echo $stat->publishedPostsNum; ?></span>
              <span class="site-state-item-name">日志</span>
            </a>
          </div>
          <div class="site-state-item site-state-categories">
            <a href="<?php echo Typecho_Router::url('page', array('slug' => 'categories'), $this->options->index); ?>">
              <span class="site-state-item-count"><?php echo $stat->categoriesNum; ?></span>
              <span class="site-state-item-name">分类</span>
            </a>
          </div>
          <div class="site-state-item site-state-tags">
            <a href="<?php echo Typecho_Router::url('page', array('slug' => 'tags'), $this->options->index); ?>">
              <span class="site-state-item-count"><?php echo getTagCount(); ?></span>
              <span class="site-state-item-name">标签</span>
            </a>
          </div>
        </nav>
      </div>
      <?php if (!empty($this->options->search_form) && in_array('ShowFeed', $this->options->search_form)) : ?>
        <div class="feed-link motion-element">
          <a href="<?php $this->options->feedUrl(); ?>" rel="alternate">
            <i class="menu-item-icon icon-next-feed"></i>
            RSS
          </a>
        </div>
      <?php endif; ?>
      <?php if (class_exists("Links_Plugin")) : ?>
        <div class="links-of-author motion-element">
          <p style="margin-bottom: 12px;"><strong>友情链接</strong></p>
          <?php Links_Plugin::output('<span class="links-of-author-item"><a href="{url}" title="{title}" target="_blank">{name}</a></span>'); ?>
        </div>
      <?php endif; ?>
    </section>
  </div>
</aside>
<div id="sidebar-dimmer"></div>
