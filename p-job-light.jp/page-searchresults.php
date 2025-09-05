<?php
  $Status = isset($_GET['status']) ? $_GET['status'] : false;
  $Area = isset($_GET['area']) ? $_GET['area'] : false;
  $Type = isset($_GET['type']) ? $_GET['type'] : false;
?>

<?php get_header(); ?>
<div class="breadcrumb-bg">
  <?php get_template_part( 'breadcrumb' ); ?>
</div>
  <?php
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
          'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
          'post_status' => 'publish',
      );

      if ($Status !== false) {
          $args['tax_query'][] = array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => $Status,
              'operator' => 'AND',
          );
      }

      if ($Area !== false) {
          $args['tax_query'][] = array(
              'taxonomy' => 'post_tag',
              'field' => 'slug',
              'terms' => $Area,
              'operator' => 'AND',
          );
      }

      if ($Type !== false) {
          $args['tax_query'][] = array(
              'taxonomy' => 'job_category',
              'field' => 'slug',
              'terms' => $Type,
              'operator' => 'AND',
          );
      }
      $search_query = new WP_Query($args);
    ?>
  <section class="archiveSearchArea">
    <div class="archiveSearchArea__inner inner">
      <div class="archiveSearchArea__head">
        <h1 class="archiveSearchArea__jobs">検索結果</h1>
        <p class="archiveSearchArea__numbers">
          <span>
            <?php echo $search_query->found_posts; ?>
          </span>件
        </p>
      </div>
      <div class="archiveSearchArea__form">
        <?php get_template_part( 'searchformBox' ); ?>
      </div>
    </div>
  </section>
  <section class="archiveJobs inner marginTop-60-120">
    <?php if ($search_query->have_posts()):?>
      <ul class="archiveJobs__cards">
        <?php while ($search_query->have_posts()) : $search_query->the_post(); ?>
          <li class="archiveJobs__card archiveCard">
            <div class="archiveCard__head">
              <picture class="archiveCard__thumbnail" >
                <?php the_post_thumbnail('post-thumbnail', array('alt' => the_title_attribute('echo=0'))); ?>
              </picture>
              <div class="archiveCard__headText">
                <h3 class="archiveCard__Type">
                  <?php the_field('job_type'); ?>
                </h3>
                <p class="archiveCard__lead" >
                  <?php the_field('lead'); ?>
                </p>
                <p class="archiveCard__description">
                  <?php the_field('job_text'); ?>
                </p>
              </div>
            </div>
            <div class="archiveCard__body">
              <p class="archiveCard__offerCompany" ><?php the_title(); ?></p>
              <p class="archiveCard__place"><?php the_field('place'); ?></p>
              <p class="archiveCard__salary"><?php the_field('salary'); ?></p>
            </div>
            <div class="archiveCard__link">
              <a href="<?php the_permalink(); ?>" ><span>詳細を見る</span></a>
            </div>
          </li>
        <?php endwhile; wp_reset_postdata();?>
        </ul>
      <div class="archiveJobs__pagination pagination">
        <?php
          if(subroopPagination()){
            echo subroopPagination();
          }
        ?>
      </div>
    <?php endif;?>
  </section>
  <div class="breadcrumb breadcrumb--sp marginTop-40-0">
      <?php
       if ( function_exists( 'bcn_display' ) ) {
        bcn_display();}
      ?>
  </div>
<?php get_footer(); ?>