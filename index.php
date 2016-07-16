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
<main id="main" class="main">
      <div class="main-inner">
        <div id="content" class="content">
<section id="posts" class="posts-expand">
    
  <?php while($this->next()): ?>  
  <article class="post post-type-normal " itemscope itemtype="http://schema.org/Article">
    <header class="post-header">
        <h1 class="post-title" itemprop="name headline">
              <a class="post-title-link" href="<?php $this->permalink() ?>" itemprop="url">
                <?php $this->title() ?>
              </a>          
        </h1>
      <div class="post-meta">
        <span class="post-time">
          发表于
          <time itemprop="dateCreated" datetime="<?php $this->date('c'); ?>" content="<?php $this->date('yy-m-d'); ?>">
            <?php $this->date('Y-m-d'); ?>
          </time>
        </span>
        <span class="post-category" >
            &nbsp; | &nbsp; 分类于
              <span itemprop="about" itemscope itemtype="https://schema.org/Thing">
                <?php $this->category(' , '); ?>
              </span>
       </span>
       <span class="post-comments-count">
                &nbsp; | &nbsp;
              <?php if(!empty($this->options->next_comments)): ?>
               <a rel="nofollow" href="<?php $this->permalink() ?>#comments"><span class="ds-thread-count" data-thread-key="<?php echo $this->cid;?>" data-count-type="comments"></span></a>
              <?php else: ?>
              <a rel="nofollow" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a>
              <?php endif; ?>
       </span>
      </div>
    </header>

    <div class="post-body">
        <?php $this->content('阅读全文 »'); ?>
    </div>

    <footer class="post-footer">

        <div class="post-eof"></div>
      
    </footer>
  </article>
<?php endwhile; ?>
  </section>
   <?php $this->pageNav('&laquo; ', ' &raquo;',5,'...',array('wrapTag' => 'nav','wrapClass' =>'pagination','itemTag'=>'','prevClass'  =>  'extend prev', 'nextClass'     =>  'extend next', 'currentClass'     =>  'page-number current')); ?>
  </div>
      </div>

<?php $this->need('sidebar.php'); ?>
    </main>

<?php $this->need('footer.php'); ?>
