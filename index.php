<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <?php get_header(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Navigation -->
  <?php get_template_part('components/header'); ?>

  <!-- Page Header -->
  <?php $home_img = array(get_template_directory_uri() . '/img/home-bg2.jpg'); ?>
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
        <!-- 投稿 -->
        <div class="fade-in fade-in-up">
          <p class="post-list-label">記事一覧</p>
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="post-preview">
                <a href="<?php the_permalink(); ?>">
                  <h2 class="post-title">
                    <?php the_title(); ?>
                  </h2>
                  <h3 class="post-subtitle">
                    <?php echo get_the_excerpt(); ?>
                  </h3>
                </a>
                <p class="post-meta">投稿日:
                  <?php the_time('Y/m/d'); ?>
                </p>
              </div>

            <?php endwhile; ?>
            <!-- Pager -->
            <div class="clearfix">
              <?php
              $link = get_previous_posts_link('&larr; 新しい記事へ');
              if ($link) {
                $link = str_replace('<a', '<a class="btn btn-primary float-left"', $link);
                echo $link;
              }
              ?>
              <?php
              $link = get_next_posts_link('古い記事へ &rarr;');
              if ($link) {
                $link = str_replace('<a', '<a class="btn btn-primary float-right"', $link);
                echo $link;
              }
              ?>
            </div>
          <?php else : ?>
            <p>記事が見つかりませんでした</p>
          <?php endif; ?>
          <hr>
        </div>

        <!-- お知らせ -->
        <div class="fade-in fade-in-up">
          <div class="news-list">
            <p class="post-list-label">お知らせ</p>
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
            <div class="clearfix">
              <a class="btn btn-primary float-right" href="<?php echo get_post_type_archive_link('news'); ?>">全てのニュース&rarr;</a>
            </div>
          </div>
          <hr>
        </div>

        <!-- 制作実績 -->
        <div class="fade-in fade-in-up">
          <div class="work-list">
            <p class="post-list-label">制作物の一覧</p>
            <div class="flex">
              <?php
              $args = array(
                'posts_per_page' => 4, // 表示する投稿数
                'post_type' => 'works', // 取得する投稿タイプのスラッグ
                'orderby' => 'date', //日付で並び替え
                'order' => 'DESC' // 降順 or 昇順
              );
              $my_posts = get_posts($args);
              ?>
              <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
                <div class="works-li">
                  <a href="<?php echo get_permalink($post->ID); ?>">
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
                      <?php echo get_the_title($post->ID); ?>
                    </p>
                    <p>
                      <?php the_excerpt(); ?>
                    </p>
                    <p>
                      <span class="date"><?php the_time('Y.m.d') ?></span>
                    </p>
                  </a>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>
            </div>
            <div class="clearfix">
              <a class="btn btn-primary float-right" href="<?php echo get_post_type_archive_link('works'); ?>">全ての実績を確認&rarr;</a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4 col-md-2 mx-auto">
        <div class="fade-in fade-in-right">
          <?php get_sidebar(); ?>
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