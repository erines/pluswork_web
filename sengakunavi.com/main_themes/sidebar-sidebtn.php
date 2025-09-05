<section class="line_entry_btn">
	<a href="https://line.me/R/ti/p/@882jzeik" target=”_blank”>
		<img class="sns" src="<?php echo get_template_directory_uri(); ?>/img/line_icon.png">
	</a>
</section>
<section class="top_btn">
  <a href="<?php get_template_directory_uri();?>#top">
	  <div id="topbtn">
		  <img class="fa-arrow-alt-circle-up" src="<?php echo get_template_directory_uri(); ?>/img/fa-arrow-alt-circle-up.png" alt="line_icon">
	  </div>
  </a>
</section>
<section class="ebook_btn">
	<a href="<?php bloginfo('url');?>/ebook-2#ebooktitle2">
		<img id="icon_click" class="ebook_mark" src="<?php echo get_template_directory_uri(); ?>/img/ebookmark.png" alt="ebookmark">
	</a>
</section>

<?php if(is_front_page()){ ?>
<section class="ebook_display">
        <div class="ebook_display_wrap" id="ebook_open">
            <span class="close_button" id="ebook_close">閉じる</span>
            <?php echo do_shortcode('[mwform_formkey key="11260"]'); ?>
        </div>
</section>
<?php }else{}?>
