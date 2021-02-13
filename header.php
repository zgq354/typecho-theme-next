<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
// 当cdn加速开启时候定义cdn的地址
if (!empty($this->options->next_cdn) && $this->options->next_cdn) {
  define('__TYPECHO_THEME_URL__', Typecho_Common::url(__TYPECHO_THEME_DIR__ . '/' . basename(dirname(__FILE__)), $this->options->next_cdn));
}
?>
<!doctype html>
<html class="theme-next <?php if (!empty($this->options->search_form) && in_array('Motion', $this->options->search_form)) echo "use-motion "; ?>theme-next-mist">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="Cache-Control" content="no-transform" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!-- 使用url函数转换相关路径 -->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic&subset=latin,latin-ext" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/fancyapps/fancybox@3/dist/jquery.fancybox.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/dist/css/main.css?v=1'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/dist/css/typecho.css?v=1'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('/dist/css/custom.css?v=1'); ?>" />
  <script type="text/javascript" id="hexo.configuration">
    var CONFIG = {
      scheme: 'Mist',
      motion: <?php if (!empty($this->options->search_form) && in_array('Motion', $this->options->search_form))
                echo "true";
              else
                echo "false";
              ?>,
      sidebar: <?php switch ($this->options->sidebar) {
                    // 始终弹出
                  case '0':
                    echo "'always'";
                    break;
                    // 有目录时弹出
                  case '1':
                    echo "'post'";
                    break;
                    // 不弹出
                  default:
                    echo "false";
                    break;
                } ?>

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
  <!-- <noscript> -->
    <style>
      .use-motion .brand,
      .use-motion .menu-item,
      .sidebar-inner,
      .use-motion .post-block,
      .use-motion .pagination,
      .use-motion .comments,
      .use-motion .post-header,
      .use-motion .post-body,
      .use-motion .collection-header { opacity: initial; }

      .use-motion .site-title,
      .use-motion .site-subtitle {
        opacity: initial;
        top: initial;
      }

      .use-motion .logo-line-before i { left: initial; }
      .use-motion .logo-line-after i { right: initial; }
    </style>
  <!-- </noscript> -->
</head>

<body itemscope itemtype="http://schema.org/WebPage" lang="zh-Hans">

  <div class="container use-motion <?php if ($this->is('index')) echo 'page-home';
                                    elseif ($this->is('post')) echo "page-post-detail";
                                    elseif ($this->is('page', 'archive') || $this->is('archive')) echo "page-archive"; ?>">
    <!--page home-->
    <div class="headband"></div>

    <header id="header" class="header" itemscope itemtype="http://schema.org/WPHeader">
      <div class="header-inner">
        <div class="site-brand-container">
          <div class="site-nav-toggle">
            <div class="toggle" aria-label="Toggle navigation bar">
              <span class="toggle-line toggle-line-first"></span>
              <span class="toggle-line toggle-line-middle"></span>
              <span class="toggle-line toggle-line-last"></span>
            </div>
          </div>
          <div class="site-meta">
            <a href="<?php $this->options->siteUrl(); ?>" class="brand" rel="start">
              <span class="logo-line-before"><i></i></span>
              <span class="logo">
                <i class="icon-next-logo"></i>
              </span>
              <h1 class="site-title"><?php $this->options->title() ?></h1>
              <span class="logo-line-after"><i></i></span>
            </a>
          </div>
          <div class="site-nav-right">
            <div class="toggle popup-trigger"></div>
          </div>
        </div>
        <!-- TODO: 移除测试用 site-nav-on -->
        <!-- <nav class="site-nav site-nav-on"> -->
        <nav class="site-nav">
          <?php $displaysearch = !empty($this->options->search_form) && in_array('ShowSearch', $this->options->search_form) ?>
          <ul id="menu" class="menu <?php if ($displaysearch) echo 'menu-left'; ?>">
            <li class="menu-item menu-item-home">
              <a href="<?php $this->options->siteUrl(); ?>" rel="section">
                <!-- TODO: home icon -->
                <!-- <i class="fa fa-home fa-fw"></i> -->
                首页
              </a>
            </li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while ($pages->next()) : ?>
              <!-- TODO: menu-item-xxx 和 icon -->
              <li class="menu-item">
                <a href="<?php $pages->permalink(); ?>" rel="section">
                  <?php $pages->title(); ?>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>

          <?php if ($displaysearch) : ?>
            <div class="site-search">
              <form class="site-search-form">
                <input type="text" id="st-search-input" name="s" class="st-search-input st-default-search-input" autocomplete="off" autocorrect="off" autocapitalize="off" value="<?php if ($this->is('search')) echo $this->getKeywords(); ?>" />
              </form>
            </div>
          <?php endif; ?>
        </nav>
      </div>
    </header>