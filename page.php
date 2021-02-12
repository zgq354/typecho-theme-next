<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main id="main" class="main">
  <div class="main-inner">
    <div id="content" class="content">
      <div id="posts" class="posts-expand">
        <?php $this->content(); ?>
      </div>
    </div>
    <?php $this->need('comments.php'); ?>
  </div>
  <?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>
