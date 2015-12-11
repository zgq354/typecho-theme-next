<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main id="main" class="main">
  <div class="main-inner">
    <div id="content" class="content">
        <div id="posts" class="posts-expand">
            <article class="post post-type-normal " itemscope itemtype="http://schema.org/Article">
              <header class="post-header">

                  <h1 class="post-title" itemprop="name headline">
                     <?php $this->title() ?>
                 </h1>

                 <div class="post-meta">
                     <span class="post-time">
                        发表于
                        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d'); ?></time>
                    </span>


                    <span class="post-category" >
                      &nbsp; | &nbsp; 分类于

                      <span itemprop="about" itemscope itemtype="https://schema.org/Thing">
                       <?php $this->category(' , '); ?>
                   </span>


               </span>

              <span class="post-comments-count">
                &nbsp; | &nbsp;
                <a rel="nofollow" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a>
       </span>

      </div>
  </header>

  <div class="post-body">


    <span itemprop="articleBody">
        <?php $this->content(); ?>
    </span>

</div>

<footer class="post-footer">

    <div class="post-tags">
        <?php $this->tags(' ', true); ?>
    </div>

    <div class="post-nav">
    
    <div class="post-nav-prev post-nav-item">
        <?php $this->thePrev('%s',''); ?>
    </div>  
    <div class="post-nav-next post-nav-item">
        <?php $this->theNext('%s',''); ?>
    </div>

</div>


</footer>
</article>

</div>
</div>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('sidebar.php'); ?>
</main>

<?php $this->need('footer.php'); ?>
