<!doctype html>
<html class="theme-next use-motion theme-next-mist">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/vendors/fancybox/source/jquery.fancybox.css?v=2.1.5'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/css/main.css?v=0.4.5.1'); ?>"/>
    <script type="text/javascript" id="hexo.configuration">
    var CONFIG = {
        scheme: 'Mist',
        sidebar: 'post'
    };
    </script>
    <title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

        <!-- 通过自有函数输出HTML头部信息 -->
        <?php $this->header(); ?>

    </head>

    <body itemscope itemtype="http://schema.org/WebPage" lang="zh-Hans">

  <div class="container one-column <?php if($this->is('index'))echo 'page-home';elseif ($this->is('post')) echo "page-post-detail";elseif ($this->is('page','archive')||$this->is('archive')) echo "page-archive";?>">
  <!--page home-->
  <div class="headband"></div>

  <header id="header" class="header" itemscope itemtype="http://schema.org/WPHeader">
      <div class="header-inner"><h1 class="site-meta">
          <span class="logo-line-before"><i></i></span>
          <a href="<?php $this->options->siteUrl(); ?>" class="brand" rel="start">
              <span class="logo">
                <i class="icon-next-logo"></i>
            </span>
            <span class="site-title"><?php $this->options->title() ?></span>
        </a>
        <span class="logo-line-after"><i></i></span>
    </h1>

    <div class="site-nav-toggle">
      <button>
        <span class="btn-bar"></span>
        <span class="btn-bar"></span>
        <span class="btn-bar"></span>
    </button>
</div>

<nav class="site-nav"><?php $displaysearch = !empty($this->options->search_form) && in_array('ShowSearch', $this->options->search_form)?>
    <ul id="menu" class="menu <?php if($displaysearch)echo 'menu-left';?>">
        <li class="menu-item menu-item-home">
          <a href="<?php $this->options->siteUrl(); ?>" rel="section">
            <i class="menu-item-icon"></i> <br />
            首页
        </a>
    </li>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
    <li class="menu-item menu-item-home">
        <a href="<?php $pages->permalink(); ?>" rel="section"><?php $pages->title(); ?></a>
    </li>
<?php endwhile; ?>
</ul>

<?php if($displaysearch): ?>
   <div class="site-search">     
  
  <form class="site-search-form">
    <input type="text" id="st-search-input" name="s" class="st-search-input st-default-search-input" autocomplete="off" autocorrect="off" autocapitalize="off" value="<?php if($this->is('search')) echo $this->getKeywords();?>"/>
  </form>

    </div>
<?php endif;?>
</nav>
</div>
</header>

