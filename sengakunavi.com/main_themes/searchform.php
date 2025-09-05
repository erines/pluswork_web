<?php
?>
<div class="widget search-widget">
  <form method="get" class="searchform" action="<?php echo esc_url( home_url('/') ); ?>">
    <select name="pref" class="searchselect">
      <option value="all_area" selected>勤務地</option>
      <option value="栃木・県南エリア">栃木・県南エリア</option>
      <option value="栃木・県央エリア">栃木・県央エリア</option>
      <option value="栃木・県北エリア">栃木・県北エリア</option>
      <option value="茨城・県西エリア">茨城・県西エリア</option>
      <option value="茨城・県南エリア">茨城・県南エリア</option>
      <option value="茨城・県央エリア">茨城・県央エリア</option>
      <option value="茨城・県北エリア">茨城・県北エリア</option>
      <option value="茨城・鹿行エリア">茨城・鹿行エリア</option>
	  <option value="その他のエリア">その他のエリア</option>
    </select>
    <p>x</p>
    <input type="text" placeholder="キーワード" name="s" class="searchkeyword searchfield" value="" />
	<input type="image" alt="検索" title=" " class="searchsubmit" src="<?php echo get_template_directory_uri(); ?>/img/search.jpeg">
  </form>       
</div>