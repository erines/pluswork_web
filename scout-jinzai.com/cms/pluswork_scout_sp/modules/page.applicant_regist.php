<?php
global $ScForm;

switch(true) {
	case ($ScForm->page == 4):
	case ($ScForm->page == 3):
	case ($ScForm->page == 2):
	case ($ScForm->page == 1):
		include dirname(__FILE__).sprintf("/page.applicant_regist.form%02d.php", $ScForm->page);
	break;
	default:
		echo "ERROR";
	break;
}
