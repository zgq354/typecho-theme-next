<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main id="main" class="main">
  <div class="main-inner">
    <div id="content" class="content">
     <section id="posts" class="posts-collapse">
      <span class="archive-move-on"></span>

      <span class="archive-page-counter">
        <?php $this->archiveTitle(array(
          'category'  =>  _t('分类 %s 下的文章'),
          'search'    =>  _t('包含关键字 %s 的文章'),
          'tag'       =>  _t('标签 %s 下的文章'),
          'author'    =>  _t('%s 发布的文章')
          ), '', ''); ?> </span>

        <?php
        $year=0; $mon=0; $i=0; $j=0;   
        $output = '';
        while($this->next()):   
          $year_tmp = date('Y',$this->created);   
        $mon_tmp = date('m',$this->created);   
             //var_dump($year_tmp);   
        $y=$year; $m=$mon;   
             //if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
             //if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($year != $year_tmp) {   
         $year = $year_tmp;   
                 //$output .= '<div class="al_year">'. $year .' 年</div><ul class="al_mon_list">'; //输出年份   
         $output .= '<div class="collection-title">
         <h2 class="archive-year motion-element" id="archive-year-'.$year.'">'.$year.'</h2>
         </div>
        '; //输出年份   
      }   
      $output .='<article class="post post-type-normal" itemscope itemtype="http://schema.org/Article">
<header class="post-header">
<h1 class="post-title">
<a class="post-title-link" href="'.$this->permalink .'" itemprop="url">
<span itemprop="name">'. $this->title .'</span>
</a>
</h1>
<div class="post-meta">
<time class="post-time" itemprop="dateCreated" datetime="'.date('c',$this->created).'" content="'.date('yy-m-d',$this->created).'">'.date('m-d',$this->created).'</time>
</div>
</header>
</article>
      ';
      endwhile;   
      echo $output;     
      ?>
    </section>
  </div>
</div>
<?php $this->need('sidebar.php'); ?>
</main>
<?php $this->need('footer.php'); ?>