<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Navigation -->
    <?php get_template_part('components/header'); ?>

    <!-- Page Header -->
    <?php $home_img = array(get_template_directory_uri() . '/img/home-bg.jpg'); ?>
    <header class="masthead" style="background-image: url('<?php echo $home_img[0] ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>作成実績</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="fade-in fade-in-up">
                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
                    <?php $args = array(
                        'posts_per_archive_page' => 6, // 表示する投稿数
                        'paged' => get_query_var('paged'), //現在のページ番号
                        'post_type' => 'works', // 取得する投稿タイプのスラッグ
                        'orderby' => 'date', //日付で並び替え
                        'order' => 'DESC', // 降順 or 昇順
                    );
                    $my_posts = new WP_Query($args); ?>
                    <?php if ($my_posts->have_posts()) : ?>
                        <div class="work-list">
                            <p class="post-list-label">作成実績一覧</p>
                            <div class="flex">
                                <?php while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
                                    <div class="works-li">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            // アイキャッチ画像を取得
                                            $thumbnail_id = get_post_thumbnail_id($post->ID);
                                            $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'small');
                                            if (get_post_thumbnail_id($post->ID)) {
                                                echo '<figure><img src="' . $thumb_url[0] . '"></figure>';
                                            } else {
                                                // アイキャッチ画像が登録されていなかったときの画像
                                                echo '<figure><img src="' . get_template_directory_uri() . '/img/home-bg.jpg"></figure>';
                                            }
                                            ?>
                                            <p class="title">
                                                <?php the_field('work-title'); ?>
                                            </p>
                                            <p>
                                                <?php the_field('work-excerpt'); ?>
                                            </p>
                                            <p class="date"><?php the_time('Y/m/d'); ?>
                                            </p>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
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
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <?php get_template_part('components/footer'); ?>
    </footer>

    <?php get_footer(); ?>

</body>

</html>