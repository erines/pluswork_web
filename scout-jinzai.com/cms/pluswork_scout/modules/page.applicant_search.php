<?php
global $sc_user;

if (!cr_user_has_role(["recruiter"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}
	
?><h2>候補者検索</h2>
<?php get_template_part( 'modules/user.searchform' ); ?>
