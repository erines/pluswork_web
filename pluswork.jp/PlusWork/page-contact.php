<?php get_header(); ?>

<main>
    <section>
        <div class="headerBackground"></div>
        <div class="titleLine">
            <p>CONTACT</p>
            <h2>お問い合わせ</h2>
        </div>
    </section>

    <section class="pankuzuList">
        <a href="<?php echo home_url(); ?>">TOP</a> > お問い合わせ
    </section>

    <section class="contact_title">
        <h1>お気軽にお問い合わせください</h1>
        <p>お問い合わせ内容の確認後、担当者よりご連絡させていただきます。</p>
    </section>

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>

    <?php get_footer(); ?>