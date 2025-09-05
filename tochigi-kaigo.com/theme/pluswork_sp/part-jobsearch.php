<?php
/**
 * 求人検索ボックスの表示用パーツ
 */
global $wp_query;

$terms = get_terms(
	"genre",
	array(
		"hide_empty"   => false,
		"hierarchical" => false,
		"orderby"      => "none",
		"order"        => "asc"
	)
);

$form_class = is_front_page() ? "form" : "form_contents";

?>
<form method="get" action="<?php echo esc_url(get_post_type_archive_link("item")); ?>">
	<div class="<?php echo esc_attr($form_class); ?>">





		<table border="0" cellpadding="0" cellspacing="0"><tbody>

            <tr>
				<th><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/search_ctg1.gif" alt="エリアを選ぶ" class="wide" /></th>
				<td>
					  <select name="locs[]" class="multi_select" multiple="multiple" size="7">
                        	<?php foreach (theme_miekaigo::$locs as $key => $searchs) : ?>

									<option value="<?php echo esc_attr($key); ?>"<?php selected(in_array($key, (array) $wp_query->get("locs")));?>><?php theme_miekaigo::the_loc_label($key); ?></option>
								<?php endforeach; ?></select>
				</td>
			</tr>



			<tr>
				<th><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/search_ctg2.gif" alt="資格を選ぶ" class="wide" /></th>
				<td>
 					 <select name="genid[]" class="multi_select" multiple="multiple" size="7">
                      	<?php foreach ($terms as $term) : ?>

    					<option value="<?php echo esc_attr($term->term_id); ?>" <?php selected(in_array($term->term_id, (array) $wp_query->get("genid"))); ?>/><?php echo esc_html($term->name); ?></option><?php endforeach; ?></select>
  </td>
			</tr>



            <tr>
				<th><img src="<?php echo get_stylesheet_directory_uri()?>/img/common/search_ctg3.gif" alt="施設形態を選ぶ" class="wide" /></th>
				<td>
					<select name="faci[]" class="multi_select" multiple="multiple" size="7">
                        <?php foreach (theme_miekaigo::$facility as $key => $searchs) : ?>
						<option value="<?php echo esc_attr($key); ?>"<?php selected(in_array($key, (array) $wp_query->get("faci")));?>><?php theme_miekaigo::the_loc_label($key); ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</tbody></table>
		<p><input type="submit" value="検索する" class="search_re" /></p>





	</div><!--form -->
</form>


<script>
jQuery(function(){
   jQuery("select.multi_select").multiselect();
});
</script>
