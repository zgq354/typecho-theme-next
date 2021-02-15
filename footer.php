<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
  <div class="footer-inner">
    <div class="copyright">
      &copy;
      <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
      <span class="with-love">
        <i class="icon-next-heart fa fa-heart"></i>
      </span>
      <span class="author" itemprop="copyrightHolder"><a href="<?php $this->options->siteUrl(); ?>"><?php if ($this->options->next_name) $this->options->next_name(); else $this->options->title(); ?></a></span>
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
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/lib/anime.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/lib/velocity/velocity.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/lib/velocity/velocity.ui.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/js/utils.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/js/motion.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/js/schemes/muse.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('/src/js/next-boot.js'); ?>"></script>
<!-- footer -->
<?php $this->footer(); ?>
</body>
</html>
