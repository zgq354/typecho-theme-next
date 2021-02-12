<?php

/**  
 * categories    
 * @package custom   
 */
Typecho_Widget::widget('Widget_Stat')->to($stat);
$this->need('header.php'); ?>
<main id="main" class="main">
  <div class="main-inner">
    <div id="content" class="content">
      <div id="posts" class="posts-collapse">
        <div class="category-all-page">
          <div class="category-all-title">
            目前共计 <?php echo $stat->categoriesNum; ?> 个分类
          </div>
          <div class="category-all">
            <ul class="category-list">
              <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li class="category-list-item">
              <a class="category-list-link" href="{permalink}">{name}</a>
              <span class="category-list-count">{count}</span>
            </li>'); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>
