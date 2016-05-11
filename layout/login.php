<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
GLOBAL $DB;
echo $OUTPUT->doctype();
$isregistration = $DB->get_record('config', array('name'=>'registerauth'));
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?php echo $OUTPUT->page_title(); ?></title>
  	<link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  	<link href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/styles.css" rel="stylesheet">  
  	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/jquery-2.1.4.js"></script>
	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/bootstrap.min.js"></script>
	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/jquery.bxslider.min.js"></script>
	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/jquery.scroll.js"></script>
	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/engine.js"></script>
	<script src="<?php echo $CFG->wwwroot ?>/theme/tikli/js/login.js"></script>
	<?php
      include($CFG->dirroot . '/theme/tikli/settings/colorchange.php');
    ?>
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body <?php echo $OUTPUT->body_attributes(); ?>>
	<?php echo $OUTPUT->standard_top_of_body_html() ?>
	<input type="hidden" id="logininfo" value ="<?php echo get_string('username'); ?>" name = "<?php echo get_string('password'); ?>"/> <!-- username and password string lang support -->
	<input type="hidden" id="gotohome" value="<?php echo $CFG->wwwroot; ?>">
	<input type="hidden" id="sitename" value="<?php if ( (get_config('theme_tikli', 'logoorsitename') === "sitename") ||  (get_config('theme_tikli', 'logoorsitename') === "iconsitename") ) { echo $SITE->fullname; } else { echo '';}?>">
	<div id="page" class="container-fluid login-page">
		<div id="page-content" class="row-fluid">
			<section id="region-main" class="container login-regin-main">
				<?php 
				echo $OUTPUT->course_content_header();
				echo $OUTPUT->main_content(); 
				echo $OUTPUT->course_content_footer();
				?>
				<?php if($isregistration->value == 'email') { ?><div class="signup-link"><?php echo get_string('firsttime'); ?><a href="<?php echo $CFG->wwwroot; ?>/login/signup.php?"><?php echo ' '.get_string('startsignup'); ?></a></div><?php } ?>
				<?php echo $OUTPUT->lang_menu(); ?>
			</section>
		</div>
	</div>
	<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
