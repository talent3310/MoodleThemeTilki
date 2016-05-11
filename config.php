<?php
$THEME->name = 'tikli';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_tikli.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->parents = array('bootstrapbase');
$THEME->sheets = array('custom');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();
$THEME->enable_dock = true;
$THEME->editor_sheets = array();
$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-pre',
    'side-post' => 'side-post'
);
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_tikli_process_css';
$THEME->enable_dock = false;
$THEME->layouts = array(
  // The site home page.
	'frontpage' => array(
	    'file' => 'frontpage.php',
      'regions' => array('side-pre'),
      'options' => array('nonavbar' => true),
	),
  'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
  ),
  'coursecategory' => array(
        'file' => 'columns3home.php',
        'defaultregion' => array(),
        'regions' => array('side-pre', 'side-post'),
        'options' => array('nonavbar' => false),
   ),
  'admin' => array(
        'file' => 'columns2.php',
        'defaultregion' => array(),
        'regions' => array('side-pre', 'side-post'),
    ),

);

