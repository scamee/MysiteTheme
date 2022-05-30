<section class="my-archive">
    <div class="writer-profile-card">
        <h3 class="wp-profile-label">プロフィール</h3>
        <?php $profile_img = array(get_template_directory_uri() . '/img/profile-img.jpeg'); ?>
        <div class="wp-img"><img src="<?php echo $profile_img[0] ?>" alt="profile-img"></div>

        <p class="wp-name">まきまき</p>
        <p class="wp-job">駆け出しエンジニア</p>

        <div class="ul-center">
            <ul>
                <li class="li-point">学んだことをアウトプット</li>
                <li class="li-point">なんでも挑戦したい</li>
                <li class="li-point">主にPHP学習中</li>
                <li class="li-point">趣味：プログラミング・お店巡り</li>
            </ul>
        </div>
        <ul class="wp-sns">
            <li><a href="https://qiita.com/makimaki_san_" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/makimaki_san_" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://github.com/scamee" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <div class="widget widget_block">
        <h3 class="widgettitle">スキル</h3>
        <?php
        $args = array(
            'posts_per_page' => -1, // 全て表示（-1）
            'post_type' => 'skill', // 取得する投稿タイプのスラッグ
            'orderby' => 'date', //日付で並び替え
            'order' => 'ASC' // 降順 or 昇順
        );
        $news_posts = get_posts($args);
        ?>
        <table class="widget-table">
            <tr>
                <th>スキル</th>
                <th>Lv</th>
            </tr>
            <?php foreach ($news_posts as $post) : setup_postdata($post); ?>
                <tr>
                    <td><?php the_field('skill-name'); ?></td>
                    <td><?php the_field('skill-value'); ?></td>
                </tr>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        </table>
    </div>
</section>

<section class="archive">
    <?php dynamic_sidebar('main-sidebar'); ?>
</section>