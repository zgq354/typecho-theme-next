  $(document).ready(function () {
    var tocSelector = '.post-toc';
    var $tocSelector = $(tocSelector);
    var activeCurrentSelector = '.active-current';

    $tocSelector
      .on('activate.bs.scrollspy', function () {
        var $currentActiveElement = $(tocSelector + ' .active').last();

        removeCurrentActiveClass();
        $currentActiveElement.addClass('active-current');

        $tocSelector[0].scrollTop = $currentActiveElement.position().top;
      })
      .on('clear.bs.scrollspy', function () {
        removeCurrentActiveClass();
      });

    function removeCurrentActiveClass () {
      $(tocSelector + ' ' + activeCurrentSelector)
        .removeClass(activeCurrentSelector.substring(1));
    }

    function processTOC () {
      getTOCMaxHeight();
      toggleTOCOverflowIndicators();
    }

    function getTOCMaxHeight () {
      var height = $('.sidebar').height() -
                   $tocSelector.position().top -
                   $('.post-toc-indicator-bottom').height();

      $tocSelector.css('height', height);

      return height;
    }

    function toggleTOCOverflowIndicators () {
      tocOverflowIndicator(
        '.post-toc-indicator-top',
        $tocSelector.scrollTop() > 0 ? 'show' : 'hide'
      );

      tocOverflowIndicator(
        '.post-toc-indicator-bottom',
        $tocSelector.scrollTop() >= $tocSelector.find('ol').height() - $tocSelector.height() ? 'hide' : 'show'
      )
    }

    $(document).on('sidebar.motion.complete', function () {
      processTOC();
    });

    $('body').scrollspy({ target: tocSelector });
    $(window).on('resize', function () {
      if ( $('.sidebar').hasClass('sidebar-active') ) {
        processTOC();
      }
    });

    onScroll($tocSelector);

    function onScroll (element) {
      element.on('mousewheel DOMMouseScroll', function (event) {
          var oe = event.originalEvent;
          var delta = oe.wheelDelta || -oe.detail;

          this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
          event.preventDefault();

          toggleTOCOverflowIndicators();
      });
    }

    function tocOverflowIndicator (indicator, action) {
      var $indicator = $(indicator);
      var opacity = action === 'show' ? 1 : 0;
      $indicator.velocity ?
        $indicator.velocity('stop').velocity({
          opacity: opacity
        }, { duration: 100 }) :
        $indicator.stop().animate({
          opacity: opacity
        }, 100);
    }

  });

  $(document).ready(function () {
    var html = $('html');
    var TAB_ANIMATE_DURATION = 200;
    var hasVelocity = $.isFunction(html.velocity);

    $('.sidebar-nav li').on('click', function () {
      var item = $(this);
      var activeTabClassName = 'sidebar-nav-active';
      var activePanelClassName = 'sidebar-panel-active';
      if (item.hasClass(activeTabClassName)) {
        return;
      }

      var currentTarget = $('.' + activePanelClassName);
      var target = $('.' + item.data('target'));

      hasVelocity ?
        currentTarget.velocity('transition.slideUpOut', TAB_ANIMATE_DURATION, function () {
          target
            .velocity('stop')
            .velocity('transition.slideDownIn', TAB_ANIMATE_DURATION)
            .addClass(activePanelClassName);
        }) :
        currentTarget.animate({ opacity: 0 }, TAB_ANIMATE_DURATION, function () {
          currentTarget.hide();
          target
            .stop()
            .css({'opacity': 0, 'display': 'block'})
            .animate({ opacity: 1 }, TAB_ANIMATE_DURATION, function () {
              currentTarget.removeClass(activePanelClassName);
              target.addClass(activePanelClassName);
            });
        });

      item.siblings().removeClass(activeTabClassName);
      item.addClass(activeTabClassName);
    });

    $('.post-toc a').on('click', function (e) {
      e.preventDefault();
      var targetSelector = escapeSelector(this.getAttribute('href'));
      var offset = $(targetSelector).offset().top;
      hasVelocity ?
        html.velocity('stop').velocity('scroll', {
          offset: offset  + 'px',
          mobileHA: false
        }) :
        $('html, body').stop().animate({
          scrollTop: offset
        }, 500);
    });

    // Expand sidebar on post detail page by default, when post has a toc.
    motionMiddleWares.sidebar = function () {
      var $tocContent = $('.post-toc-content');
      if (CONFIG.sidebar === 'post') {
        if ($tocContent.length > 0 && $tocContent.html().trim().length > 0) {
          displaySidebar();
        }
      }
    };
  });

menu={};
$('h2,h3').each(function(){
  if ($(this).attr('id')){
    return;
  }
  $(this).attr('id',$(this).text().replace(/ /g,''));
  if ($(this).is('h2')){
    if (menu[$(this).text()] ==undefined){
      menu[$(this).text()]=[];
    }
    menu.last=$(this).text();
  }
  if ($(this).is('h3')){
    menu[menu.last].push($(this).text());
  }
});
$('.sidebar-inner').prepend('<ul class="sidebar-nav motion-element"><li class="sidebar-nav-toc sidebar-nav-active" data-target="post-toc-wrap">文章目录</li><li class="sidebar-nav-overview" data-target="site-overview">站点概览</li></ul>');
//组织目录
if (menu.last){
  var ii=0;
  h2List=$('<ol class="nav"></ol>');
  for (i in menu){
    h2=menu[i];
    if (typeof(menu[i]) =='string'){
      continue;
    }
    ii++;
    h2Node=$('<li class="nav-item nav-level-2"><a class="nav-link" href="#'+(i.replace(/ /g,''))+'"><span class="nav-text">'+i+'</span></a></li>');
    if (h2.length){
      jj=0;
      h3List=$('<ol class="nav-child"></ol>');
      for (j in h2){
        jj++;
        h3=h2[j];
        h3Node=$('<li class="nav-item nav-level-3"><a class="nav-link" href="#'+(h3.replace(/ /g,''))+'"><span class="nav-text">'+h3+'</span></a></li>')
        h3List.append(h3Node);
      }
      if(h3List.text().length){
        h2Node.append(h3List);
      }
    }
    h2List.append(h2Node);
  }
  if (h2List.text()){
    $('.post-toc').html('<div class="post-toc-content motion-element">'+h2List[0].outerHTML+'</div>')
  }else {
    $('.post-toc').html('');
  }
}

