<?php
global $sc_user;

if (!cr_user_has_role(["recruiter","applicant"],$sc_user->ID)) {
	echo 'このページを閲覧する権限がありません。';
	return;
}
	
?><?php get_template_part( 'modules/user.mail_users' ); ?>
