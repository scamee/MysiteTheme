<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <?php get_header(); ?>

</head>

<body>

  <!-- Navigation -->
  <?php get_template_part('components/header'); ?>

  <!-- Page Header -->
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php $img = array(get_template_directory_uri() . '/img/home-bg.jpg'); ?>
      <header class="masthead" style="background-image: url('<?php echo $img[0] ?>')">
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

      <!-- Post Content -->
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="single-content">
                <h1 class="single-title"><?php the_title(); ?></h1>
                <p class="single-date">投稿日：<?php the_date(); ?></p>
                <?php
                $category = get_the_category();
                echo '<li class="single-category">カテゴリー：<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
                ?>
                <hr>
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col-lg-4 col-md-2 mx-auto">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>

  <hr>

  <!-- Footer -->
  <footer>
    <?php get_template_part('components/footer'); ?>
  </footer>

  <?php get_footer(); ?>

</body>

</html>