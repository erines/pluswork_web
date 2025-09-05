<?php get_header(); ?>

<main>
    <section>
        <div class="headerBackground"></div>
        <div class="titleLine">
            <p>NEWS</p>
            <h2>お知らせ</h2>
        </div>
    </section>

    <section class="pankuzuList">
        <a href="<?php echo home_url(); ?>">TOP</a> > お知らせ
    </section>

    <section>
        <div class="news_category">
            <h3>CATEGORY
                <div class="lineArrow"></div>
            </h3>
            <div class="category_List">
                <?php
                $cats = get_categories();
                usort($cats, function ($a, $b) {
                    //順番の数値が未入力の場合は0とする
                    if (!get_field("表示順", "category_" . $a->term_id))
                        $a->term_id = 0;
                    if (!get_field("表示順", "category_" . $b->term_id))
                        $b->term_id = 0;

                    return get_field("表示順", "category_" . $a->term_id) - get_field("表示順", "category_" . $b->term_id);
                });
                foreach ($cats as $cat):
                    $cat_name = $cat->name;
                    $cat_url = get_category_link($cat->term_id);
                    $cat_slug = $cat->category_nicename;
                    ?>
                    <?php if ($cat_name === "すべて"): ?>
                        <a class="cate_all" href="<?php echo $cat_url; ?>"><?php echo $cat_name ?></a>
                    <?php else: ?>
                        <a class="cate_List" href="<?php echo $cat_url; ?>"><?php echo $cat_name ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- スマホ -->
        <div class="sp_news">
            <h3>CATEGORY
                <div class="lineArrow"></div>
            </h3>
            <div class="sp_category_List">
                <div class="sp_cate_List">
                    <a class="cate_all" href="<?php echo home_url(); ?>/category/news/news">すべて</a>
                    <a class="cate_List" href="<?php echo home_url(); ?>/category/news/news-news">お知らせ</a>
                </div>
                <div class="sp_cate_List">
                    <a class="cate_List" href="<?php echo home_url(); ?>/category/news/jobcollege">ジョブカレッジ</a>
                    <a class="cate_List" href="<?php echo home_url(); ?>/category/news/other">その他</a>
                </div>
            </div>
        </div>
    </section>

    <section class="news_detail">
        <div class="news_img">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail(
                    'large', /* 任意の画像サイズ */
                    array(
                        'class' => 'my-class',
                        'id' => 'my-id'
                    )
                ); ?>
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/20250214-101121.png" alt="ニュース">
            <?php endif; ?>
        </div>
        <div class="news_text">
            <p><?php echo post_custom('date'); ?></p>
            <h2 class="detail_title"><?php echo post_custom('title'); ?></h2>
            <p><?php echo post_custom('detail'); ?></p>
        </div>
    </section>

</main>

<?php get_footer(); ?>