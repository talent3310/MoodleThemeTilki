<?php
// Get the HTML for the settings bits.
$html = theme_tikli_get_html_for_settings($OUTPUT, $PAGE);
GLOBAL $USER, $PAGE, $CFG, $DB;
$checklogo = $PAGE->theme->setting_file_url('logo', 'logo');
if(!empty($checklogo)) {
  $haslogo = $PAGE->theme->setting_file_url('logo', 'logo');
} else {
  $haslogo = $CFG->wwwroot.'/theme/tikli/pix/logo-2.png';
}

$checkicon = $PAGE->theme->setting_file_url('icon', 'icon');
if(!empty($checkicon)) {
  $hasiconlogo = $PAGE->theme->setting_file_url('icon', 'icon');
} else {
  $hasiconlogo = $CFG->wwwroot.'/theme/tikli/pix/icon-logo.png';
}
echo $OUTPUT->doctype();

$isregistration = $DB->get_record('config', array('name'=>'registerauth'));
$colorscheme = get_config('theme_tikli', 'colorscheme');
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $OUTPUT->page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  <link rel="stylesheet" href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/font-awesome.css">
  <link href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/styles.css" rel="stylesheet">  
  <script src="<?php echo $CFG->wwwroot; ?>/theme/tikli/js/jquery-2.1.4.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/tikli/js/bootstrap.min.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/tikli/js/jquery.bxslider.min.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/tikli/js/engine.js"></script>
  <link href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo $CFG->wwwroot ?>/theme/tikli/css/jquery.bxslider.css" rel="stylesheet">
  <?php
      include($CFG->dirroot . '/theme/tikli/settings/colorchange.php');
  ?>
  <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<?php include $CFG->dirroot . '/theme/tikli/analyticstracking.php'; ?>
<header role="banner" class="navbar navbar-fixed-top">
  <nav role="navigation" class="navbar-inner">
    <?php if (get_config('theme_tikli', 'logoorsitename') === "logo") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <img alt="logo" src="<?php echo $haslogo;?>" />
      </a>
    </div>
    <?php } else if (get_config('theme_tikli', 'logoorsitename') === "sitename") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <h1><?php echo $SITE->fullname; ?></h1>
      </a>
    </div>
    <?php } else if (get_config('theme_tikli', 'logoorsitename') === "iconsitename") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <h1><span class="logoicon"><img alt="logo" src="<?php echo $hasiconlogo;?>" /></span><span><?php echo $SITE->fullname; ?></span></h1>
      </a>
    </div>
    <?php } ?>
    <?php if(isloggedin()) { 
      if ( $CFG->version >= '2015051100.00' ) {
        $file = get_string('privatefiles');
      } else {
          $file = get_string('myfiles');
      }
    ?>
      <div class="usermenu">
        <div>
          <ul class="menubar menubars">
            <li>
              <a href="javascript:void(0);">
                <span class="userbutton">
                  <span>
                    <span class="avatar current">
                      <?php echo $OUTPUT->user_profile_picture(); ?>
                    </span>
                  </span>
                  <span><?php echo $USER->firstname;?> <span><?php echo $USER->lastname;?></span></span>
                </span>
              </a>
            </li>
          </ul>
          <ul class="menu menulist">
            <?php $checkenablemy = $PAGE->theme->settings->enablemy; if (!empty($checkenablemy)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/my">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-home-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-home-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('myhome'); ?></span>
              </a>
            </li>
            <?php } ?>
            <?php $checkenableprofile = $PAGE->theme->settings->enableprofile; if (!empty($checkenableprofile)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/user/profile.php?id=<?php echo $USER->id;?>">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-user-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-user-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('profile'); ?></span>
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/message/index.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-mail-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-mail-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('messages', 'chat'); ?></span>
              </a>
            </li>
            <?php $checkprivatefiles = $PAGE->theme->settings->enableprivatefiles; if (!empty($checkprivatefiles)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/user/files.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-file-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-file-1-h.png" alt=""></i>
                </span>
                <span><?php echo $file;?></span>
              </a>
            </li>
            <?php } ?>
            <?php  $checkenablebadges = $PAGE->theme->settings->enablebadges; if (!empty($checkenablebadges)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/badges/view.php?type=1">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-badge-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-badge-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('badges', 'badges');?></span>
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/login/logout.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/column3/i-out-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/tikli/css/img/<?php echo $colorscheme ?>/i-out-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('logout');?></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <?php if (!empty($CFG->custommenuitems)) { ?>
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <i class="fa fa-arrow-circle-down"></i>

      </a>
      <div class="nav-collapse collapse">
      <?php echo $OUTPUT->custom_menu();?>
      </div>
      <?php } ?>
    <?php } else { ?>

    <div class="logining-wr">
        <a href="<?php echo $CFG->wwwroot; ?>/login/index.php"><?php echo get_string('login');?></a>
        <?php if($isregistration->value == 'email') { ?>
          <a href="<?php echo $CFG->wwwroot; ?>/login/signup.php?"><?php echo get_string('startsignup'); ?></a>
        <?php } ?>
      </div>
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <i class="fa fa-arrow-circle-down"></i>

      </a>
      <div class="nav-collapse collapse">
      <?php echo $OUTPUT->custom_menu();?>
      </div>
    <?php } ?>
  </nav>
</header>
