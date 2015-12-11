<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer id="footer" class="footer">
      <div class="footer-inner"> 
<div class="copyright" >
  &copy; &nbsp; 
  <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
  <span class="with-love">
    <i class="icon-next-heart"></i>
  </span>
  <span class="author" itemprop="copyrightHolder"><?php $this->options->title(); ?></span>
</div>

<div class="powered-by">
  <?php _e('由 <a class="theme-link" href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>
</div>

<div class="theme-info">
  主题 -
  <a class="theme-link" href="https://github.com/iissnan/hexo-theme-next">
    NexT.Mist
  </a>
</div>
       </div>
</footer>
<div class="back-to-top"></div>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/jquery/index.js?v=2.1.3');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/fancybox/source/jquery.fancybox.pack.js');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/fancy-box.js?v=0.4.5.1');?>"></script>


<script type="text/javascript" src="<?php $this->options->themeUrl('/js/helpers.js?v=0.4.5.1');?>"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/velocity/velocity.min.js');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/velocity/velocity.ui.min.js');?>"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/js/motion_global.js?v=0.4.5.1');?>" id="motion.global"></script>

<script type="text/javascript" src="<?php $this->options->themeUrl('/js/nav-toggle.js?v=0.4.5.1');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/vendors/fastclick/lib/fastclick.min.js?v=1.0.6');?>"></script>

<?php if ($this->is('post')): ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/bootstrap.scrollspy.js?v=0.4.5.1');?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/js/post_sidebar.js?v=0.4.5.1');?>"></script>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function () {
	if (CONFIG.sidebar === 'always') {
		displaySidebar();
	}
	if (isMobile()) {
		FastClick.attach(document.body);
	}
});
</script>
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
<?php $this->footer(); ?>
</body>
</html>
