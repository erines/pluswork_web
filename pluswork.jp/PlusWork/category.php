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

                $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

                foreach ($cats as $cat):
                    $cat_name = $cat->name;
                    $cat_url = get_category_link($cat->term_id);
                    $cat_slug = $cat->category_nicename;
                    ?>
                    <?php if ($cat_url === $url): ?>
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

                $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

                foreach ($cats as $cat):
                    $cat_name = $cat->name;
                    $cat_url = get_category_link($cat->term_id);
                    $cat_slug = $cat->category_nicename;
                    ?>
                    <?php if ($cat_url === $url): ?>
                        <a class="cate_all" href="<?php echo $cat_url; ?>"><?php echo $cat_name ?></a>
                    <?php else: ?>
                        <a class="cate_List" href="<?php echo $cat_url; ?>"><?php echo $cat_name ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="news_List_area">
        <div class="news_List_row">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <a class="news_List" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/20250214-101121.png" alt="ニュース">
                        <?php endif; ?>
                        <div class="n_date">
                            <p class="news_date"><?php echo post_custom('date'); ?></p>
                            <?php
                            $cats = get_the_category();
                            foreach ($cats as $cat):
                                $cat_name = $cat->name;
                                $cat_url = get_category_link($cat->term_id);
                                ?>
                                <span class="category_name" data-text="<?php echo $cat_name; ?>"><?php echo $cat_name; ?></span>
                            <?php endforeach; ?>
                        </div>
                        <p class="news_title"><?php echo post_custom('title'); ?></p>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="error">
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- スマホ -->
    <section class="sp_news_List_area">
        <div class="sp_news_List_row">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <a class="sp_news_List" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/20250214-101121.png" alt="ニュース">
                        <?php endif; ?>
                        <div class="n_date">
                            <p class="news_date"><?php echo post_custom('date'); ?></p>
                            <?php
                            $cats = get_the_category();
                            foreach ($cats as $cat):
                                $cat_name = $cat->name;
                                $cat_url = get_category_link($cat->term_id);
                                ?>
                                <p class="category_name"data-text="<?php echo $cat_name; ?>"><?php echo $cat_name; ?></p>
                            <?php endforeach; ?>
                        </div>
                        <p class="news_title"><?php echo post_custom('title'); ?></p>
                    </a>
                <?php endwhile; ?>

            <?php else: ?>
                <div class="error">
                    <p>お探しの記事は見つかりませんでした。</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <div class="pagenavi">
        <?php wp_pagenavi(); ?>
    </div>

    <div class="s_margin"></div>

</main>
<?php get_footer(); ?>