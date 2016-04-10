<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="footer" class="footer">
      <div class="footer-inner"> 
<div class="copyright" >
  &copy;
  <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
  <span class="with-love">
    <i class="icon-next-heart fa fa-heart"></i>
  </span>
  <span class="author" itemprop="copyrightHolder"><a href="<?php $this->options->siteUrl(); ?>"><?php if($this->options->next_name) $this->options->next_name(); else $this->options->title(); ?></a></span>
</div>

<div class="powered-by">
  <?php _e('由 <a class="theme-link" href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>
</div>

<div class="theme-info">
  主题 -
  <a class="theme-link" href="https://github.com/zgq354/typecho-theme-next">
    NexT.Mist
  </a>
</div>
       </div>
</footer>
<div class="back-to-top"></div>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/jquery/index.js?v=2.1.3');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/fancybox/source/jquery.fancybox.pack.js');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/fancy-box.js?v=0.4.5.2');?>"></script>


<script type="text/javascript" src="<?php $this->options->themeUrl('/js/helpers.js?v=0.4.5.2');?>"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/velocity/velocity.min.js');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/velocity/velocity.ui.min.js');?>"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/js/motion.js?v=0.4.5.2');?>" id="motion.global"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/fastclick/lib/fastclick.min.js?v=1.0.6');?>"></script>

<?php if ($this->is('post')): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/bootstrap.scrollspy.js?v=0.4.5.2');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/post_sidebar.js?v=0.4.5.2');?>"></script>
<?php endif; ?>

 <?php if ($this->is('page','archive')||$this->is('archive')): ?>
    <script type="text/javascript" id="motion.page.archive">
      $('.archive-year').velocity('transition.slideLeftIn');
    </script>
  <?php endif;?>

<script type="text/javascript" src="<?php $this->options->themeUrl('/js/lazyload.js');?>"></script>
<script type="text/javascript">
$(function () {
	$("#posts").find('img').lazyload({
		placeholder: "<?php $this->options->themeUrl('/images/loading.gif');?>",
		effect: "fadeIn"
	});
});
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/bootstrap.js?v=0.4.5.2');?>"></script>

<?php if(!empty($this->options->next_comments)): ?>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:<?php echo '"'.$this->options->next_comments.'"'; ?>};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
</script>
<!-- 多说公共JS代码 end -->
<?php endif;?>

<?php $this->footer(); ?>
</body>
</html>
