<?php
add_action('init', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    //管理画面に実績の追加投稿ページを作成
    register_post_type('works', [
        'label' => '制作実績',
        'public' => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-edit',
        'supports' => array('title', 'thumbnail'),
    ]);

    //管理画面にスキルの追加投稿ページを作成
    register_post_type('skill', [
        'label' => 'スキル',
        'public' => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-edit',
        'supports' => array('title'),
    ]);

    //管理画面にお知らせの追加投稿ページを作成
    register_post_type('news', [
        'label' => 'お知らせ',
        'public' => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-edit',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ]);

    //商品の追加投稿ページにジャンルの機能追加
    register_taxonomy('genre', 'works', [
        'label' => '作品ジャンル',
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);

    register_nav_menus([
        'global_nav' => 'グローバルナビゲーション',
    ]);

    //sidebarの追加
    register_sidebar([
        'name' => 'MainSidebar',
        'id' => 'main-sidebar',
        'description' => 'メインのウィジェット',
    ]);
});


function get_image_default()
{
    if (has_post_thumbnail()) :
        $id = get_post_thumbnail_id();
        $img = wp_get_attachment_image_src($id, 'large');
    else :
        $img = array(get_template_directory_uri() . '/img/post-bg.jpg');
    endif;

    return $img;
}
