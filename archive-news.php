<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Navigation -->
    <?php get_template_part('components/header'); ?>

    <!-- Page Header -->
    <?php $home_img = array(get_template_directory_uri() . '/img/about-bg.jpg'); ?>
    <header class="masthead" style="background-image: url('<?php echo $home_img[0] ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1><?php bloginfo('name'); ?></h1>
                        <span class="subheading"><?php bloginfo('description'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                <?php $args = array(
                    'posts_per_archive_page' => 10, // 表示する投稿数
                    'paged' => get_query_var('paged'), //現在のページ番号
                    'post_type' => 'news', // 取得する投稿タイプのスラッグ
                    'orderby' => 'date', //日付で並び替え
                    'order' => 'DESC', // 降順 or 昇順
                );
                $my_posts = new WP_Query($args); ?>
                <?php if ($my_posts->have_posts()) : ?>
                    <div class="fade-in fade-in-up">
                        <div class="news-list">
                            <p class="post-list-label">お知らせ一覧</p>
                            <?php
                            $args = array(
                                'posts_per_page' => 3, // 表示する投稿数
                                'post_type' => 'news', // 取得する投稿タイプのスラッグ
                                'orderby' => 'date', //日付で並び替え
                                'order' => 'DESC' // 降順 or 昇順
                            );
                            $news_posts = get_posts($args);
                            ?>
                            <?php foreach ($news_posts as $post) : setup_postdata($post); ?>
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <p class="title">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                </a>
                                <br>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        <hr>
                    </div>

                    <!-- Pager -->
                    <div class="clearfix">
                        <?php
                        $link = get_previous_posts_link('&larr; 前の実績を見る',);
                        if ($link) {
                            $link = str_replace('<a', '<a class="btn btn-primary float-left"', $link);
                            echo $link;
                        }
                        ?>
                        <?php
                        $link = get_next_posts_link('次の実績を見る &rarr;', $my_posts->max_num_pages);
                        if ($link) {
                            $link = str_replace('<a', '<a class="btn btn-primary float-right"', $link);
                            echo $link;
                        }
                        ?>
                    </div>
                <?php else : ?>
                    <p>制作実績が見つかりませんでした</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <?php get_template_part('components/footer'); ?>
    </footer>

    <?php get_footer(); ?>

</body>

</html>