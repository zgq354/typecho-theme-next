<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

    $siteUrl = Helper::options()->siteUrl;

    $next_name = new Typecho_Widget_Helper_Form_Element_Text('next_name', NULL, '', _t('侧边栏显示的昵称'), _t('显示在头像下方'));
    $next_name->input->setAttribute('class', 'w-100 mono');
    $form->addInput($next_name);


    $next_gravatar = new Typecho_Widget_Helper_Form_Element_Text('next_gravatar', NULL, '', _t('侧边栏头像'), _t('填写Gravatar头像的邮箱地址'));
    $next_gravatar->input->setAttribute('class', 'w-100 mono');
    $form->addInput($next_gravatar->addRule('email', '请填写一个邮箱地址'));

    $next_tips = new Typecho_Widget_Helper_Form_Element_Text('next_tips', NULL, '一个高端大气上档次的网站', _t('站点描述'), _t('将显示在侧边栏的昵称下方'));
    $form->addInput($next_tips);

    $next_cdn = new Typecho_Widget_Helper_Form_Element_Text('next_cdn', NULL, $siteUrl, _t('cdn镜像地址'), _t('静态文件cdn镜像加速地址，加速js和css，如七牛，又拍云等<br>格式参考：'.$siteUrl.'<br>不用请留空或者保持默认'));
    $form->addInput($next_cdn);

    $sidebar = new Typecho_Widget_Helper_Form_Element_Radio('sidebar', 
    array(_t('始终自动弹出'),
        _t('文章中有目录时弹出'),
        _t('不自动弹出')
        ),
    1, _t('侧边栏自动弹出设置'));
    
    $form->addInput($sidebar);

    $search_form = new Typecho_Widget_Helper_Form_Element_Checkbox('search_form', 
    array('ShowSearch' => _t('显示搜索框'),
        'ShowFeed' => _t('显示RSS订阅'),
        ),
    array('ShowSearch','ShowFeed'), _t('其他设置'));
    
    $form->addInput($search_form->multiMode());
}

function getGravatar($email, $s = 40, $d = 'mm', $g = 'g') {

    $hash = md5($email);

    $avatar = "http://gravatar.duoshuo.com/avatar/$hash?s=$s&d=$d&r=$g";

    return $avatar;

}

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/
function themeInit($archive) {

    //归档列表全部输出
    if ($archive->is('archive')&& !$archive->is('search')) {
        $archive->parameter->pageSize = 10000; // 自定义条数
    }
}