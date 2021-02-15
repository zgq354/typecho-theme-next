<?php

/**
 * 移植Hexo主题Next.Mist
 * 
 * @package Next.Mist
 * @author zgq354
 * @version 1.2.6
 * @link http://blog.izgq.net/archives/444/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main class="main">
  <div class="main-inner">
    <div class="content-wrap">
      <div class="content index posts-expand">
        <?php while ($this->next()) : ?>
          <article class="post-block" itemscope itemtype="http://schema.org/Article">
            <header class="post-header">
              <h2 class="post-title" itemprop="name headline">
                <a class="post-title-link" href="<?php $this->permalink() ?>" itemprop="url">
                  <?php $this->title() ?>
                </a>
              </h2>
              <div class="post-meta">
                <span class="post-meta-item">
                  <span class="post-meta-item-icon">
                    <i class="far fa-calendar"></i>
                  </span>
                  <span class="post-meta-item-text">发表于</span>
                  <time itemprop="dateCreated" datetime="<?php $this->date('c'); ?>" content="<?php $this->date('yy-m-d'); ?>">
                    <?php $this->date('Y-m-d'); ?>
                  </time>
                </span>
                <span class="post-meta-item">
                  <span class="post-meta-item-icon">
                    <i class="far fa-folder"></i>
                  </span>
                  <span class="post-meta-item-text">分类于</span>
                  <span itemprop="about" itemscope="" itemtype="http://schema.org/Thing">
                    <?php $this->category(' , '); ?>
                  </span>
                </span>
                <span class="post-meta-item">
                  <span class="post-meta-item-icon">
                    <i class="far fa-comment"></i>
                  </span>
                  <span class="post-meta-item-text"></span>
                  <a rel="nofollow" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a>
                </span>
              </div>
            </header>
            <div class="post-body">
              <!-- TODO: 阅读全文按钮、与按上次位置跳转的完善，搞完 bookmark 功能再跟进 -->
              <?php $this->content('阅读全文 »'); ?>
            </div>
            <footer class="post-footer">
              <div class="post-eof"></div>
            </footer>
          </article>
        <?php endwhile; ?>
        <?php $this->pageNav('&laquo; ', ' &raquo;', 3, '...', array('wrapTag' => 'nav', 'wrapClass' => 'pagination', 'itemTag' => '', 'prevClass' => 'extend prev', 'nextClass' => 'extend next', 'defaultClass' => 'page-number', 'currentClass' => 'page-number current', 'textClass' => 'space')); ?>
      </div>
    </div>
  </div>

  <?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>