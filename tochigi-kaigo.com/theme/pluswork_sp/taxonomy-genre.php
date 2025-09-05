<?php
// ジャンル名(スラッグ)を取得
$q_gen = get_query_var("gen");
// ジャンル情報を取得
$term = get_term_by("slug", $q_gen, "genre");
// 指定された投稿タイプに該当するフロント(アーカイブ)ページのURLを取得する (ここでの投稿タイプは "item")
$archive_url = get_post_type_archive_link("item");
// 上記で取得したURLにジャンルIDを付加する
$archive_url = add_query_arg(array("genid[]" => $term->term_id), $archive_url);
// 上記で生成したURLへリダイレクト
wp_redirect($archive_url);