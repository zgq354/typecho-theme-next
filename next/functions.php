<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

    $next_name = new Typecho_Widget_Helper_Form_Element_Text('next_name', NULL, '', _t('侧边栏显示的昵称'), _t('显示在头像下方'));
    $next_name->input->setAttribute('class', 'w-100 mono');
    $form->addInput($next_name);


    $next_gravatar = new Typecho_Widget_Helper_Form_Element_Text('next_gravatar', NULL, '', _t('侧边栏头像'), _t(''));
    $next_gravatar->input->setAttribute('class', 'w-100 mono');
    $form->addInput($next_gravatar->addRule('email', '请填写一个邮箱地址'));

    $next_tips = new Typecho_Widget_Helper_Form_Element_Text('next_tips', NULL, '一个高端大气上档次的网站', _t('站点描述'), _t('显示在昵称下方'));
    $form->addInput($next_tips);

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