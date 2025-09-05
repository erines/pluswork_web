<form role="search" action="<?php echo esc_url(home_url('/searchresults/')); ?>" method="get" class="searchJobs__form">
  <dl class="searchJobs__formRow">
      <dt>働き方・雇用形態</dt>
      <dd>
          <label>
              <input type="radio" name="status" value="" checked="checked" />
              <span>すべて</span>
          </label>
          <?php
            $taxonomy_terms = get_terms('category');
            if(!empty($taxonomy_terms)&&!is_wp_error($taxonomy_terms)):?>
            <?php foreach($taxonomy_terms as $taxonomy_term):?>
              <label>
                <input type="radio" name="status" value="<?php echo $taxonomy_term->slug; ?>" />
                <span><?php echo $taxonomy_term->name; ?></span>
              </label>
            <?php endforeach;?>
          <?php endif;?>
      </dd>
  </dl>
  <dl class="searchJobs__formRow">
      <dt>エリア</dt>
      <dd>
        <select name="area" >
          <option disabled selected>選択してください</option>

          <?php
          $pref_tags = get_terms('post_tag', 'parent=0');
          foreach($pref_tags as $pref_tag) {
            echo '<optgroup label="'.$pref_tag->name.'">';

            $city_tags = get_terms('post_tag', 'child_of='.$pref_tag->term_id);
            if($city_tags) {
              foreach ($city_tags as $city_tag) {
                echo '<option value="'.$city_tag->slug.'">'.$city_tag->name.'</option>';
              }
            }
            echo '</optgroup>';
          }
          ?>

        </select>
      </dd>
  </dl>
  <div class="searchJobs__formButton form__button ">
    <input type="submit" value="この条件で検索する" />
  </div>
</form>
