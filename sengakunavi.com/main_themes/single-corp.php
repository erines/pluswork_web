<?php get_header();?>

<?php if (post_password_required()) : ?>
    <div class="password-protected-form">
<!--         <p>このコンテンツはパスワードで保護されています。表示するにはパスワードを入力してください。</p> -->
        <?php echo get_the_password_form(); ?>
    </div>
<?php else : ?>

	<section class="intro">
    <div class="intro_wrap">
		<div class="intro_info_logo">
		  <div class="intro_info">
			<div class="intro_information">
			  <?php $value = get_post_meta($post->ID, 'intro_company', true); if(empty($value)):else:?>
				<h2 class="intro_company"><?php echo CFS()->get('intro_company');?></h2>
			  <?php endif; ?>
			  <?php $value = get_post_meta($post->ID, 'intro_business', true); if(empty($value)):else:?>
				<p class="intro_business"><?php echo CFS()->get('intro_business');?></p>
			  <?php endif; ?>
			  <?php $value = get_post_meta($post->ID, 'intro_post', true); if(empty($value)):else:?>
				<p class="intro_post"><?php echo CFS()->get('intro_post');?></p>
			  <?php endif; ?>
			  <?php $value = get_post_meta($post->ID, 'intro_address', true); if(empty($value)):else:?>
				<p class="intro_address"><?php echo CFS()->get('intro_address');?></p>
			  <?php endif; ?>
			  <?php $value = get_post_meta($post->ID, 'intro_hp', true); if(empty($value)):else:?>
				<p class="intro_hp"><?php echo CFS()->get('intro_hp');?></p>
			  <?php endif; ?>
				<?php $value = get_post_meta($post->ID, 'intro_youtube', true); if(empty($value)):else:?>
				<p class="intro_youtube"><?php echo CFS()->get('intro_youtube');?></p>
			  <?php endif; ?>
			</div> 
		  </div>
			<?php
				$value = get_post_meta($post->ID, 'intro_logo', false);
				$value_douga = get_post_meta($post->ID, 'douga', true);
					if (!empty($value) && empty($value_douga)) {
			?>
				<div class="intro_logo_image">
					<img class="intro_logo" src="<?php echo CFS()->get('intro_logo');?>" alt="">
				</div>
			<?php
			}
			?>
		</div>
      <?php $value = get_post_meta($post->ID, 'thumbnail', true); if(empty($value)):else:?>
		<div>
			<div class="intro_image">
				<img class="intro_img" src="<?php echo CFS()->get('thumbnail');?>"alt="">
        	</div>
		</div>
      <?php endif; ?>
    </div>
  </section>
	<section class="video_view">
		<?php $value = get_post_meta($post->ID, 'douga', true); if(empty($value)):else:?>
	  <div class="intro_video_wrap">
		  <div class="intro_video_wrap1">
			  <p class="video_title">＜企業からの動画メッセージ＞</p>
			  <div class="video_logo_message">
				  <?php $value = get_post_meta($post->ID, 'video_message', true); if(empty($value)):else:?>
			  		<p class="video_message"><?php echo CFS()->get('video_message');?></p>
			  		<?php endif; ?>
			  		<?php $value = get_post_meta($post->ID, 'intro_logo', true); if(empty($value)):else:?>
			  		<div class="intro_logo_image">
						<img class="intro_logo" src="<?php echo CFS()->get('intro_logo');?>"alt="">
			  		</div>
			  	<?php endif; ?>  
			  </div>
		  </div>
		  <div>
			  <div class="intro_video_wrap2">
				  <video id="video_click" class="intro_video" controls src="<?php echo CFS()->get('douga');?>"alt=""></video>
			  </div>
		  </div>			
		</div>
	<?php endif; ?>
	</section>
  <?php $value = get_post_meta($post->ID, 'about_company', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section  class="company">
    <div  class="company_wrap">
      <h2>
        <p>About</p>
        <p>COMPANY</p>
      </h2>
      <div class="company_contents">
        <div>
          <?php $value = get_post_meta($post->ID, 'company_headline', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('company_headline');?></p>
          <?php endif; ?>
          <?php $value = get_post_meta($post->ID, 'company_message', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('company_message');?></p>
          <?php endif; ?>      
        </div>
        <?php $value = get_post_meta($post->ID, 'company_eye_catch', true); if(empty($value)):else:?>
          <div class="company_main_image">
            <img class="company_main_img" src="<?php echo CFS()->get('company_eye_catch');?>"alt="">
          </div>
        <?php endif; ?>
      </div>
      <ul>
        <?php $value = get_post_meta($post->ID, 'company_sub_img1', true); if(empty($value)):else:?>
          <li class="company_list">
            <img class="company_sub_img" src="<?php echo CFS()->get('company_sub_img1');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'company_sub_img2', true); if(empty($value)):else:?>
          <li class="company_list">
            <img class="company_sub_img" src="<?php echo CFS()->get('company_sub_img2');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'company_sub_img3', true); if(empty($value)):else:?>
          <li class="company_list">
            <img class="company_sub_img" src="<?php echo CFS()->get('company_sub_img3');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'company_sub_img4', true); if(empty($value)):else:?>
          <li class="company_list">
            <img class="company_sub_img" src="<?php echo CFS()->get('company_sub_img4');?>"alt="">
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <?php endif;?>
  <?php $value = get_post_meta($post->ID, 'corporate_information', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="corporate">
    <div class="corporate_wrap">
      <h2>
        <p>Corporate</p>
        <p>INFORMATION</p>
<!--         <span>数値で見る情報</span> -->
      </h2>
      <ul>
        <?php $value = get_post_meta($post->ID, 'corporate_img1', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img1', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img1');?>"alt="">
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_item1', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item1');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value1', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value1');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'corporate_img2', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img2', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img2');?>"alt="">
            <?php endif; ?> 
            <?php $value = get_post_meta($post->ID, 'corporate_item2', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item2');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value2', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value2');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'corporate_img3', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img3', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img3');?>"alt="">
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_item3', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item3');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value3', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value3');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'corporate_img4', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img4', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img4');?>"alt="">
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_item4', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item4');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value4', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value4');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'corporate_img5', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img5', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img5');?>"alt="">
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_item5', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item5');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value5', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value5');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'corporate_img6', true); if(empty($value)):else:?>
          <li class="corporate_list">
            <?php $value = get_post_meta($post->ID, 'corporate_img6', true); if(empty($value)):else:?>
              <img class="corporate_img" src="<?php echo CFS()->get('corporate_img6');?>"alt="">
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_item6', true); if(empty($value)):else:?>        
              <p><?php echo CFS()->get('corporate_item6');?></p>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'corporate_value6', true); if(empty($value)):else:?>        
			  <p><span><?php echo CFS()->get('corporate_value6');?></span></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <?php endif;?>
  <?php $value = get_post_meta($post->ID, 'staff_interview', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="staff">
    <div class="staff_wrap">
      <h2>
        <p>Staff</p>
        <p>INTERVIEW<br>
          <span>先輩たちにインタビュー</span>
        </p>
      </h2>
      <ul>
        <?php $value = get_post_meta($post->ID, 'staff_name1', true); if(empty($value)):else:?>
          <li class="staff_list">
            <?php $value = get_post_meta($post->ID, 'staff_img1', true); if(empty($value)):else:?>
              <img class="staff_img" src="<?php echo CFS()->get('staff_img1');?>"alt="">
            <?php endif; ?>
            <diV class="staff_profile">
				<?php $value = get_post_meta($post->ID, 'staff_years_of_service1', true); if(empty($value)):else:?>
				<div class="staff_joining">
					<div>
						<p>勤続</p>
						<p><span><?php echo CFS()->get('staff_years_of_service1');?></span></p>
					</div>	
				</div>
              <?php endif; ?>
              <div class="staff_name">
                <?php $value = get_post_meta($post->ID, 'staff_department1', true); if(empty($value)):else:?>
                  <p><?php echo CFS()->get('staff_department1');?></p>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'staff_name1', true); if(empty($value)):else:?>
				  <p><?php echo CFS()->get('staff_name1');?><span>さん</span></p>
                <?php endif; ?>
              </div>
            </diV>
            <?php $value = get_post_meta($post->ID, 'staff_hobby1', true); if(empty($value)):else:?>
              <div class="staff_hobby">
                <p></p>
                <p><?php echo CFS()->get('staff_hobby1');?></p>
              </div>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'staff_comment1', true); if(empty($value)):else:?>
              <p class="staff_comment"><?php echo CFS()->get('staff_comment1');?></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'staff_name2', true); if(empty($value)):else:?>
          <li class="staff_list">
            <?php $value = get_post_meta($post->ID, 'staff_img2', true); if(empty($value)):else:?>
              <img class="staff_img" src="<?php echo CFS()->get('staff_img2');?>"alt="">
            <?php endif; ?>
            <diV class="staff_profile">
				<?php $value = get_post_meta($post->ID, 'staff_years_of_service2', true); if(empty($value)):else:?>
				<div class="staff_joining">
					<div>
						<p>勤続</p>
						<p><span><?php echo CFS()->get('staff_years_of_service2');?></span></p>
					</div>
				</div>
				<?php endif; ?>
              <div class="staff_name">
                <?php $value = get_post_meta($post->ID, 'staff_department2', true); if(empty($value)):else:?>
                  <p><?php echo CFS()->get('staff_department2');?></p>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'staff_name2', true); if(empty($value)):else:?>
				  <p><?php echo CFS()->get('staff_name2');?><span>さん</span></p>
                <?php endif; ?>
              </div>
            </diV>
            <?php $value = get_post_meta($post->ID, 'staff_hobby2', true); if(empty($value)):else:?>
              <div class="staff_hobby">
                <p></p>
                <p><?php echo CFS()->get('staff_hobby2');?></p>
              </div>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'staff_comment2', true); if(empty($value)):else:?>
              <p class="staff_comment"><?php echo CFS()->get('staff_comment2');?></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'staff_name3', true); if(empty($value)):else:?>
          <li class="staff_list">
            <?php $value = get_post_meta($post->ID, 'staff_img3', true); if(empty($value)):else:?>
              <img class="staff_img" src="<?php echo CFS()->get('staff_img3');?>"alt="">
            <?php endif; ?>
            <diV class="staff_profile">
				<?php $value = get_post_meta($post->ID, 'staff_years_of_service3', true); if(empty($value)):else:?>
				<div class="staff_joining">
					<div>
						<p>勤続</p>
						<p><span><?php echo CFS()->get('staff_years_of_service3');?></span></p>
					</div>
				</div>
              <?php endif; ?>
              <div class="staff_name">
                <?php $value = get_post_meta($post->ID, 'staff_department3', true); if(empty($value)):else:?>
                  <p><?php echo CFS()->get('staff_department3');?></p>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'staff_name3', true); if(empty($value)):else:?>
				  <p><?php echo CFS()->get('staff_name3');?><span>さん</span></p>
                <?php endif; ?>
              </div>
            </diV>
            <?php $value = get_post_meta($post->ID, 'staff_hobby3', true); if(empty($value)):else:?>
              <div class="staff_hobby">
                <p></p>
                <p><?php echo CFS()->get('staff_hobby3');?></p>
              </div>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'staff_comment3', true); if(empty($value)):else:?>
              <p class="staff_comment"><?php echo CFS()->get('staff_comment3');?></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'staff_name4', true); if(empty($value)):else:?>
          <li class="staff_list">
            <?php $value = get_post_meta($post->ID, 'staff_img4', true); if(empty($value)):else:?>
              <img class="staff_img" src="<?php echo CFS()->get('staff_img4');?>"alt="">
            <?php endif; ?>
            <diV class="staff_profile">
              <?php $value = get_post_meta($post->ID, 'staff_years_of_service4', true); if(empty($value)):else:?>
				<div class="staff_joining">
					<div>
						<p>勤続</p>
						<p><span><?php echo CFS()->get('staff_years_of_service4');?></span></p>	
					</div>
				</div>
				<?php endif; ?>
              <div class="staff_name">
                <?php $value = get_post_meta($post->ID, 'staff_department4', true); if(empty($value)):else:?>
                  <p><?php echo CFS()->get('staff_department4');?></p>
                <?php endif; ?>
                <?php $value = get_post_meta($post->ID, 'staff_name4', true); if(empty($value)):else:?>
				  <p><?php echo CFS()->get('staff_name4');?><span>さん</span></p>
                <?php endif; ?>
              </div>
            </diV>
            <?php $value = get_post_meta($post->ID, 'staff_hobby4', true); if(empty($value)):else:?>
              <div class="staff_hobby">
                <p></p>
                <p><?php echo CFS()->get('staff_hobby4');?></p>
              </div>
            <?php endif; ?>
            <?php $value = get_post_meta($post->ID, 'staff_comment4', true); if(empty($value)):else:?>
              <p class="staff_comment"><?php echo CFS()->get('staff_comment4');?></p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>
  <?php endif;?>
<?php $value = get_post_meta($post->ID, 'round_table', true);?>
<?php if(empty($value)):?>
<?php else:?>
  <section class="discussion">
    <div class="discussion_wrap">
      <h2>
		  <p>round-table<br><span>discussion</span></p> 
        <?php $value = get_post_meta($post->ID, 'discussion_title', true); if(empty($value)):else:?>
          <p><?php echo CFS()->get('discussion_title');?></p>
        <?php endif; ?>
      </h2>
      <div class="discussion_member_wrap">
        <?php $value = get_post_meta($post->ID, 'member_img', true); if(empty($value)):else:?>
          <div class="member_image">
            <img class="member_img" src="<?php echo CFS()->get('member_img');?>"alt="">
          </div>
        <?php endif; ?>
        <ul class="discussion_member">
          <?php $value = get_post_meta($post->ID, 'member_name1', true); if(empty($value)):else:?>
            <li class="discussion_staff">
				<p class="member_img_position"><?php echo CFS()->get('member_img_position1');?></p>
              <p class="member_naming"><?php echo CFS()->get('member_naming1');?></p>
              <p class="member_name"><?php echo CFS()->get('member_name1');?></p>
              <p class="member_comment"><?php echo CFS()->get('member_comment1');?></p>
            </li>
          <?php endif; ?>
          <?php $value = get_post_meta($post->ID, 'member_name2', true); if(empty($value)):else:?>
            <li class="discussion_staff">
				<p class="member_img_position"><?php echo CFS()->get('member_img_position2');?></p>
              <p class="member_naming"><?php echo CFS()->get('member_naming2');?></p>
              <p class="member_name"><?php echo CFS()->get('member_name2');?></p>
              <p class="member_comment"><?php echo CFS()->get('member_comment2');?></p>
            </li>
          <?php endif; ?>
          <?php $value = get_post_meta($post->ID, 'member_name3', true); if(empty($value)):else:?>
            <li class="discussion_staff">
				<p class="member_img_position"><?php echo CFS()->get('member_img_position3');?></p>
              <p class="member_naming"><?php echo CFS()->get('member_naming3');?></p>
              <p class="member_name"><?php echo CFS()->get('member_name3');?></p>
              <p class="member_comment"><?php echo CFS()->get('member_comment3');?></p>
            </li>
          <?php endif; ?>
          <?php $value = get_post_meta($post->ID, 'member_name4', true); if(empty($value)):else:?>
            <li class="discussion_staff">
				<p class="member_img_position"><?php echo CFS()->get('member_img_position4');?></p>
              <p class="member_naming"><?php echo CFS()->get('member_naming4');?></p>
              <p class="member_name"><?php echo CFS()->get('member_name4');?></p>
              <p class="member_comment"><?php echo CFS()->get('member_comment4');?></p>
            </li>
          <?php endif; ?>
        </ul>
      </div>
      <ul class="discussion_contents">
		    <?php $value = get_post_meta($post->ID, 'discussion_question1', true); if(empty($value)):else:?>
       	  <li class="discussion_content">
            <p class="discussion_question"><?php echo CFS()->get('discussion_question1');?></p>
            <p class="discussion_comment"><?php echo CFS()->get('discussion_comment1');?></p>
		      </li>
        <?php endif; ?>
		    <?php $value = get_post_meta($post->ID, 'discussion_question2', true); if(empty($value)):else:?>
       	  <li class="discussion_content">
            <p class="discussion_question"><?php echo CFS()->get('discussion_question2');?></p>
            <p class="discussion_comment"><?php echo CFS()->get('discussion_comment2');?></p>
		      </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'discussion_question3', true); if(empty($value)):else:?>
       	  <li class="discussion_content">
            <p class="discussion_question"><?php echo CFS()->get('discussion_question3');?></p>
            <p class="discussion_comment"><?php echo CFS()->get('discussion_comment3');?></p>
		      </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'discussion_question4', true); if(empty($value)):else:?>
       	  <li class="discussion_content">
            <p class="discussion_question"><?php echo CFS()->get('discussion_question4');?></p>
            <p class="discussion_comment"><?php echo CFS()->get('discussion_comment4');?></p>
		      </li>
        <?php endif; ?>
			</ul>
    </div>
  </section>
<?php endif; ?>
 <?php $value = get_post_meta($post->ID, 'staff_daily_schedule', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="staff_schedule">
    <div class="staff_schedule_wrap">
      <h2>
		<p>Staff</p>
        <p>1day schedule<br>
          <span>先輩社員の1日</span>
        </p>
      </h2>
		<div class="staff_schedule_1">
		<?php $value = get_post_meta($post->ID, 'staff_schedule_name1', true); if(empty($value)):else:?>
          <p class= "staff_schedule_oneday"><?php echo CFS()->get('staff_schedule_name1');?></p>
        <?php endif; ?>
      <ul>
		<?php $value = get_post_meta($post->ID, 'staff1_schedule_action1', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action1');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time1');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment1');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img1', true); if(empty($value)):else:?>
				  <div class="staff_schedule_img">
					  <img  src="<?php echo CFS()->get('staff1_schedule_img1');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		  <?php $value = get_post_meta($post->ID, 'staff1_schedule_action2', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action2');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time2');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment2');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img2', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff1_schedule_img2');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff1_schedule_action3', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action3');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time3');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment3');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img3', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff1_schedule_img3');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff1_schedule_action4', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action4');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time4');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment4');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img4', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff1_schedule_img4');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff1_schedule_action5', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action5');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time5');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment5');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img5', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff1_schedule_img5');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff1_schedule_action6', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff1_schedule_action6');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff1_schedule_time6');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff1_schedule_comment6');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff1_schedule_img6', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff1_schedule_img6');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
			</ul>
		  </div>
				<div class="staff_schedule_2">
		<?php $value = get_post_meta($post->ID, 'staff_schedule_name2', true); if(empty($value)):else:?>
          <p class= "staff_schedule_oneday"><?php echo CFS()->get('staff_schedule_name2');?></p>
        <?php endif; ?>
      <ul>
		<?php $value = get_post_meta($post->ID, 'staff2_schedule_action1', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action1');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time1');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment1');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img1', true); if(empty($value)):else:?>
				  <div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img1');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		  <?php $value = get_post_meta($post->ID, 'staff2_schedule_action2', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action2');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time2');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment2');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img2', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img2');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff2_schedule_action3', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action3');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time3');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment3');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img3', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img3');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff2_schedule_action4', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action4');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time4');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment4');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img4', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img4');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff2_schedule_action5', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action5');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time5');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment5');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img5', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img5');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
		   <?php $value = get_post_meta($post->ID, 'staff2_schedule_action6', true); if(empty($value)):else:?>
       	<li class="staff_schedule_list">
			<div class="staff_schedule_frame">
			  <p class="staff_schedule_action"><?php echo CFS()->get('staff2_schedule_action6');?></p>
			  <div>
				<div>
				  <p class = "staff_schedule_time"><?php echo CFS()->get('staff2_schedule_time6');?></p>
				  <p class = "staff_schedule_comment"><?php echo CFS()->get('staff2_schedule_comment6');?></p>
				</div>
				<?php $value = get_post_meta($post->ID, 'staff2_schedule_img6', true); if(empty($value)):else:?>
					<div class="staff_schedule_img">
					<img  src="<?php echo CFS()->get('staff2_schedule_img6');?>"alt="">  
				  </div>
				 <?php endif; ?>
			  </div>
			</div>
		  </li>
		  <?php endif; ?>
			</ul>
		  </div>
	  </div>
  </section>
  <?php endif;?>
<?php $value = get_post_meta($post->ID, 'ceo_interview', true);?>
<?php if(empty($value)):?>
<?php else:?>
  <section class="ceo">
    <div class="ceo_wrap">
      <h2>
        <?php $value = get_post_meta($post->ID, 'ceo_director', true); if(empty($value)):else:?>
          <p><?php echo CFS()->get('ceo_director');?></p>
        <?php endif; ?>
        <p>INTERVIEW<br><span>インタビュー</span></p> 
      </h2>
      <div class="ceo_comment">
        <?php $value = get_post_meta($post->ID, 'ceo_img', true); if(empty($value)):else:?>
          <div class="ceo_image">
            <img class="ceo_img" src="<?php echo CFS()->get('ceo_img');?>"alt="">
          </div>
        <?php endif; ?>
        <div>
          <?php $value = get_post_meta($post->ID, 'ceo_headline', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('ceo_headline');?></p>
          <?php endif; ?>   
          <?php $value = get_post_meta($post->ID, 'ceo_message', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('ceo_message');?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif;?>
<?php $value = get_post_meta($post->ID, 'manager_interview', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="manager">
    <div class="manager_wrap">
      <h2>
        <?php $value = get_post_meta($post->ID, 'manager_director', true); if(empty($value)):else:?>
          <p><?php echo CFS()->get('manager_director');?></p>
        <?php endif; ?>
        <p>INTERVIEW<br><span>インタビュー</span></p> 
      </h2>
      <div class="manager_comment">
        <?php $value = get_post_meta($post->ID, 'manager_img', true); if(empty($value)):else:?>
          <div class="manager_image">
            <img class="manager_img" src="<?php echo CFS()->get('manager_img');?>"alt="">
          </div>
        <?php endif; ?>
        <div>
          <?php $value = get_post_meta($post->ID, 'manager_headline', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('manager_headline');?></p>
          <?php endif; ?>   
          <?php $value = get_post_meta($post->ID, 'manager_message', true); if(empty($value)):else:?>
            <p><?php echo CFS()->get('manager_message');?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif;?>
<?php $value = get_post_meta($post->ID, 'q_and_a', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="qa">
    <div class="qa_wrap">
      <h2>
		<?php $value = get_post_meta($post->ID, 'corp_contents', true); if(empty($value)):else:?>
          <p><?php echo CFS()->get('corp_contents');?></p>
        <?php endif; ?>
      </h2>
      <ul>
		<?php $value = get_post_meta($post->ID, 'q_list1', true); if(empty($value)):else:?>
          <li class="qa_list">
            <?php $value = get_post_meta($post->ID, 'q_list1', true); if(empty($value)):else:?>
              <div class="q_list">
                <p><?php echo CFS()->get('q_list1');?></p>
              </div>
            <?php endif; ?>         
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list1');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment1');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'q_list2', true); if(empty($value)):else:?>
          <li class="qa_list">
              <div class="q_list">
                <p><?php echo CFS()->get('q_list2');?></p>
              </div>   
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list2');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment2');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'q_list3', true); if(empty($value)):else:?>
          <li class="qa_list">
              <div class="q_list">
                <p><?php echo CFS()->get('q_list3');?></p>
              </div>    
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list3');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment3');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'q_list4', true); if(empty($value)):else:?>
          <li class="qa_list">
              <div class="q_list">
                <p><?php echo CFS()->get('q_list4');?></p>
              </div>        
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list4');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment4');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'q_list5', true); if(empty($value)):else:?>
          <li class="qa_list">
              <div class="q_list">
                <p><?php echo CFS()->get('q_list5');?></p>
              </div>     
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list5');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment5');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
		<?php $value = get_post_meta($post->ID, 'q_list6', true); if(empty($value)):else:?>
          <li class="qa_list">
              <div class="q_list">
                <p><?php echo CFS()->get('q_list6');?></p>
              </div>     
            <div class="a_list">
                <div>
                  <p><?php echo CFS()->get('a_list6');?></p>
                </div>
                <div>
                  <p><?php echo CFS()->get('a_comment6');?></p>
                </div>
            </div>
          </li>
		<?php endif; ?>
      </ul>
    </div>
  </section>
<?php endif;?>
 <?php $value = get_post_meta($post->ID, 'charm_institution', true);?>
<?php if(empty($value)):?>
<?php else:?>
<section class="charm">
	<div class="charm_wrap">
    <h2>
      <?php $value = get_post_meta($post->ID, 'any_point', true); if(empty($value)):else:?>
        <p><?php echo CFS()->get('any_point');?></p>
      <?php endif; ?>
    </h2>
    <ul>
      <?php $value = get_post_meta($post->ID, 'charm_point1', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point1');?></p>
          </div>
		<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img1', true); if(empty($value)):else:?>
          <div class="charm_img">
            <img  src="<?php echo CFS()->get('charm_img1');?>"alt="">
          </div>
          <?php endif; ?>
          <div>
            <p><?php echo CFS()->get('charm_comment1');?></p>
          </div>
		</div>
        </li>
      <?php endif; ?>
      <?php $value = get_post_meta($post->ID, 'charm_point2', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point2');?></p>
          </div>
			<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img2', true); if(empty($value)):else:?>
          <div class="charm_img">
            <img  src="<?php echo CFS()->get('charm_img2');?>"alt="">
          </div>
          <?php endif; ?>
          <div>
            <p><?php echo CFS()->get('charm_comment2');?></p>
          </div>
			</div>
        </li>
      <?php endif; ?>
      <?php $value = get_post_meta($post->ID, 'charm_point3', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point3');?></p>
          </div>
			<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img3', true); if(empty($value)):else:?>   
            <div class="charm_img">
              <img  src="<?php echo CFS()->get('charm_img3');?>"alt="">
            </div>
          <?php endif; ?>
          <div>
            <p><?php echo CFS()->get('charm_comment3');?></p>
          </div>
			</div>
        </li>
      <?php endif; ?>
      <?php $value = get_post_meta($post->ID, 'charm_point4', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point4');?></p>
          </div>
			<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img4', true); if(empty($value)):else:?>       
            <div class="charm_img">
              <img  src="<?php echo CFS()->get('charm_img4');?>"alt="">
            </div>
          <?php endif; ?>
          <div>
			  <p><?php echo CFS()->get('charm_comment4');?></p>
          </div>
			</div>
        </li>
      <?php endif; ?>
      <?php $value = get_post_meta($post->ID, 'charm_point5', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point5');?></p>
          </div>
			<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img5', true); if(empty($value)):else:?>    
            <div class="charm_img">
              <img  src="<?php echo CFS()->get('charm_img5');?>"alt="">
            </div>
          <?php endif; ?>
          <div>
            <p><?php echo CFS()->get('charm_comment5');?></p>
          </div>
			</div>
        </li>
      <?php endif; ?>
 		<?php $value = get_post_meta($post->ID, 'charm_point6', true); if(empty($value)):else:?>
        <li class="charm_list">
          <div class="charm_point">
            <p><?php echo CFS()->get('charm_point6');?></p>
          </div>
			<div class="charm_flex">
          <?php $value = get_post_meta($post->ID, 'charm_img6', true); if(empty($value)):else:?>    
            <div class="charm_img">
              <img  src="<?php echo CFS()->get('charm_img6');?>"alt="">
            </div>
          <?php endif; ?>
          <div>
            <p><?php echo CFS()->get('charm_comment6');?></p>
          </div>
			</div>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</section>
<?php endif;?>
  <?php $value = get_post_meta($post->ID, 'photo_clip', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="photo">
    <div class="photo_wrap">
      <h2>
        <p>Corporate</p>
        <p>PHOTO CLIP</p>
      </h2>
      <ul>
        <?php $value = get_post_meta($post->ID, 'photo_img1', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img1');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'photo_img2', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img2');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'photo_img3', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img3');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'photo_img4', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img4');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'photo_img5', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img5');?>"alt="">
          </li>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'photo_img6', true); if(empty($value)):else:?>
          <li class="photo_list">
            <img class="photo_img" src="<?php echo CFS()->get('photo_img6');?>"alt="">
          </li>
        <?php endif; ?> 
      </ul>
    </div>
  </section>
  <?php endif;?>
  <?php $value = get_post_meta($post->ID, 'recruit_information', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="recruit">
    <div class="recruit_wrap">
      <h2>
        <p>Recruit</p>
        <p>INFORMATION<br>
          <span>募集要項</span>
        </p>
      </h2>
      <div>
        <?php $value = get_post_meta($post->ID, 'recruit_corp', true); if(empty($value)):else:?>
          <div>
            <p>会社名</p>
            <p><?php echo CFS()->get('recruit_corp');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_status', true); if(empty($value)):else:?> 
          <div>
            <p>雇用形態</p>
            <p><?php echo CFS()->get('recruit_status');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_address', true); if(empty($value)):else:?>
          <div>
            <p>勤務地</p>
            <p><?php echo CFS()->get('recruit_address');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_occupation', true); if(empty($value)):else:?>
          <div>
            <p>職種名</p>
            <p><?php echo CFS()->get('recruit_occupation');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_job', true); if(empty($value)):else:?>
          <div>
            <p>業務内容</p>
            <p><?php echo CFS()->get('recruit_job');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_salary', true); if(empty($value)):else:?>
          <div>
            <p>給与</p>
            <p><?php echo CFS()->get('recruit_salary');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_salary_breakdown', true); if(empty($value)):else:?>
		  <div>
			  <p>給与内訳・手当等</p>
			  <p><?php echo CFS()->get('recruit_salary_breakdown');?></p>
		  </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_salary_increase', true); if(empty($value)):else:?>
          <div>
            <p>昇給</p>
            <p><?php echo CFS()->get('recruit_salary_increase');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_bonus', true); if(empty($value)):else:?>
          <div>
            <p>賞与</p>
            <p><?php echo CFS()->get('recruit_bonus');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_carfare', true); if(empty($value)):else:?>
          <div>
            <p>通勤手当</p>
            <p><?php echo CFS()->get('recruit_carfare');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_working_hours', true); if(empty($value)):else:?>
          <div>
            <p>勤務時間</p>
            <p><?php echo CFS()->get('recruit_working_hours');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_overtime', true); if(empty($value)):else:?>
          <div>
            <p>時間外勤務</p>
            <p><?php echo CFS()->get('recruit_overtime');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_holiday', true); if(empty($value)):else:?>
          <div>
            <p>休日・休暇</p>
            <p><?php echo CFS()->get('recruit_holiday');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_treatment', true); if(empty($value)):else:?>
		  <div>
			  <p>加入保険・福利厚生・待遇</p>
			  <p><?php echo CFS()->get('recruit_treatment');?></p>
		  </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_license', true); if(empty($value)):else:?>
          <div>
            <p>資格・経験</p>
            <p><?php echo CFS()->get('recruit_license');?></p>
          </div>
        <?php endif; ?>
        <?php $value = get_post_meta($post->ID, 'recruit_number', true); if(empty($value)):else:?>
          <div>
            <p>採用予定人数</p>
            <p><?php echo CFS()->get('recruit_number');?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif;?>
  <?php $value = get_post_meta($post->ID, 'entry_contat', true);?>
  <?php if(empty($value)):?>
  <?php else:?>
  <section class="entry">
    <div class="entry_wrap" id="entrywrap">
      <h2>
        <p>ENTRY FORM</p>
        <p>エントリーフォーム</p>
      </h2>
		<?php echo do_shortcode('[mwform_formkey key="538"]'); ?>
		
		<div class="privacy_content">
        <p>個人情報の取り扱いについて</p>
        <p class="privacy-policy">株式会社プラスワーク(以下弊社とする)は、当プライバシーポリシーを掲示し、当プライバシーポリシーに準拠して私たちの提供するサービスを利用する企業・団体・および個人のプライバシーを尊重し、個人情報の管理に細心の注意を払い、これを取り扱います。<br><br>

        個人情報の定義<br>
        当該情報に含まれる氏名、生年月日、その他の記述等により特定の個人を識別できるもの/個人識別符号が含まれるもの<br><br>
        
        個人情報の利用目的<br>
        弊社のお問い合わせやサービスへのお申し込み等を通じて、お預かりした個人情報は、以下に示す利用目的のために、適正に利用するものと致します。<br><br>
        
        ・お客様からのお問い合わせ等に対応するため。<br>
        ・お客様からお申し込みいただいたサービス等の提供のため。<br>
        ・当サイトのサービス向上・改善、新サービスを検討するための分析等を行うため。<br>
        ・個人を識別できない形で統計データを作成し、当サイトおよびお客様の参考資料とするため。<br><br>
        
        個人情報の第三者提供<br>
        当サイトのお問い合わせやサービスへのお申し込み等を通じて、お預かりした個人情報は、個人情報保護法その他の法令に基づき開示が認められる場合を除き、ご本人様の同意を得ずに第三者に提供することはありません。<br><br>
        
        アクセス解析ツールについて<br>
        弊社では、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。このGoogleアナリティクスはトラフィックデータの収集のためにクッキー（Cookie）を使用しております。トラフィックデータは匿名で収集されており、個人を特定するものではありません。<br><br>
        
        個人情報の開示について
        ご本人からの求めに応じ本人確認ができた場合のみ、情報を開示します。公開された個人情報が事実と異なる場合、訂正や削除に応じます。個人情報の取り扱いに関する苦情に対し、適切・迅速に対処します。<br>
        ご本人からの請求であることを確認するため、本人確認書類(免許証、保険証など)の写しを、当社宛にご郵送してください。<br><br>
        
        会社名：株式会社プラスワーク<br>
        代表者：宮田 直樹<br>
        住所:〒323-0823 栃木県小山市天神町一丁目9番9号<br><br>
        
        内容を確認させていただき、ご本人からの請求であることが確認でき次第、送付させていただきます。
        </p>
      </div>
    </div>
  </section>
  <?php endif;?>

<?php endif; ?>

  <?php get_sidebar('sidebtn');?>
  <?php get_footer();?>