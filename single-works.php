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
            <?php $img = array(get_template_directory_uri() . '/img/works-bg.jpg'); ?>
            <header class="masthead" style="background-image: url('<?php echo $img[0] ?>')">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="post-heading">
                                <h1>ポートフォリオ</h1>
                                <h2><?php the_field('work-title'); ?></h2>
                                <span class="meta">投稿日：<?php the_date(); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Post Content -->
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 mx-auto">
                            <div class="single-content">
                                <table>
                                    <tr>
                                        <td>作品名</td>
                                        <td><?php the_field('work-title'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>使用言語</td>
                                        <td><?php the_field('work-language'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>作成期間</td>
                                        <td><?php the_field('work-production-period'); ?></td>
                                    </tr>
                                </table>
                                <p>
                                    <?php the_field('work-info'); ?>
                                </p>
                                <?php if (get_field('work-image')) : ?>
                                    <img src="<?php the_field('work-image'); ?>">
                                <?php endif; ?>
                                <?php if (get_field('work-url')) : ?>
                                    <div class="work-url">
                                        <a href="<?php the_field('work-url'); ?>">
                                            URL:
                                            <?php the_field('work-url'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
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