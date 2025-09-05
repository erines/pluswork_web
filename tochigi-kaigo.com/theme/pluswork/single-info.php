<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<!-- メインカラム -->
		<div id="contents" class="right">
        
<div class="contents_top"> 
	<div class="white_box">










<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    
    
    <div class="title01_wrapper">
		<div class="title01">
    	<div class="page_title"><?php the_title(); ?></div>
    	</div>
	</div>





<div class="white_box_inner">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<div class="news_wrapper">
        	<div class="news_photo">
        	<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('medium', array("alt" => get_the_title() . " イメージ")); ?>
			<?php else:?>
				<img src="<?php echo get_stylesheet_directory_uri()?>/img/common/info_img_m.jpg" alt="<?php echo esc_attr(get_the_title()); ?> イメージ">
			<?php endif; ?>
            </div>
        

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>


<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

		</div>
    </div><!-- #post-## -->
    
    
    
    
    

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php WS_previous_post_link( 10, '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php WS_next_post_link( 10, '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
                    <div class="clear"><hr /></div>
				</div><!-- #nav-below -->


<div class="back_archive_box"><span class="back_archive"><a href="<?php echo site_url("info"); ?>/">お役立ち情報一覧へ</a></span></div>


</div><!-- .white_box_inner -->



<?php endwhile; // end of the loop. ?>











				    </div><!-- white_box -->
				</div>
                
                
</div><!-- #contents -->
<!-- /メインカラム -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
