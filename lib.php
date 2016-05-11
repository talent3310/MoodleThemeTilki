<?php
function theme_tikli_get_setting($setting, $format = false) {
    global $CFG;
    require_once($CFG->dirroot . '/lib/weblib.php');
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('tikli');
    }
    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}
/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */
function theme_tikli_process_css($css, $theme) {

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_tikli_set_logo($css, $logo);

    if (!empty($theme->settings->fontnamebody)) {
        $font = $theme->settings->fontnamebody;
    } else {
        $font = 'Raleway';
    }
    $logobackgroundimage = $theme->setting_file_url('logobackgroundimage', 'logobackgroundimage');

    $parallaxbackgroundimage = $theme->setting_file_url('parallaxbackgroundimage', 'parallaxbackgroundimage');
    $css = theme_tikli_set_parallaxbackgroundimage($css, $parallaxbackgroundimage);
    
    $headingfont = theme_tikli_get_setting('fontnameheading');
    $bodyfont = theme_tikli_get_setting('fontnamebody');
    $css = theme_tikli_set_logobackgroundimage($css, $logobackgroundimage);
    $css = theme_tikli_set_headingfont($css, $headingfont);
    $css = theme_tikli_set_bodyfont($css, $bodyfont);
    $css = theme_tikli_set_fontfiles($css, 'heading', $headingfont);
    $css = theme_tikli_set_fontfiles($css, 'body', $bodyfont);
    
    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_tikli_set_customcss($css, $customcss);
    return $css;
}
function theme_tikli_set_parallaxbackgroundimage($css, $parallaxbackgroundimage) {
    GLOBAL $CFG;
    $tag = '[[setting:parallaxbackgroundimage]]';
    $replacement = $parallaxbackgroundimage;
    if (is_null($replacement)) {
        $replacement = $CFG->wwwroot.'/theme/tikli/css/img/bg-banner-2.jpg';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
function theme_tikli_set_logobackgroundimage($css, $themelogobackgroundimage) {
    GLOBAL $CFG;
    $colorscheme = get_config('theme_tikli', 'colorscheme');
    $tag = '[[setting:logobackgroundimage]]';
    $replacement = $themelogobackgroundimage;
    if (is_null($replacement)) {
        $replacement = $CFG->wwwroot.'/theme/tikli/css/img/'.$colorscheme.'/b-logo.png';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function theme_tikli_set_headingfont($css, $headingfont) {
    $tag = '[[setting:headingfont]]';
    $replacement = $headingfont;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function theme_tikli_set_bodyfont($css, $bodyfont) {
    $tag = '[[setting:bodyfont]]';
    $replacement = $bodyfont;
    $css = str_replace($tag, $replacement, $css);
    return $css;
}
/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_tikli_set_logo($css, $logo) {
    GLOBAL $CFG;
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = $CFG->wwwroot.'/theme/tikli/pix/logo-2.png';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function theme_tikli_set_pagebackgroundstyle($css, $style) {
    $tagattach = '[[setting:backgroundattach]]';
    $tagrepeat = '[[setting:backgroundrepeat]]';
    $tagsize = '[[setting:backgroundsize]]';
    $replacementattach = 'fixed';
    $replacementrepeat = 'no-repeat';
    $replacementsize = 'cover';
    if ($style === 'tiled') {
        $replacementrepeat = 'repeat';
        $replacementsize = 'initial';
    } else if ($style === 'stretch') {
        $replacementattach = 'scroll';
    }
    $css = str_replace($tagattach, $replacementattach, $css);
    $css = str_replace($tagrepeat, $replacementrepeat, $css);
    $css = str_replace($tagsize, $replacementsize, $css);
    return $css;
}
/**
 * Adds the font to CSS.
 *
 * @param string $css The CSS.
 * @param string $font The font name.
 * @return string The parsed CSS
 */

function theme_tikli_set_fontfiles($css, $type, $fontname) {
    $tag = '[[setting:fontfiles' . $type . ']]';
    $replacement = '';
    if (theme_tikli_get_setting('fontselect') === '2') {
        static $theme;
        if (empty($theme)) {
            $theme = theme_config::load('tikli');  // $theme needs to be us for child themes.
        }

        $fontfiles = array();
        $fontfileeot = $theme->setting_file_url('fontfileeot' . $type, 'fontfileeot' . $type);
        if (!empty($fontfileeot)) {
            $fontfiles[] = "url('" . $fontfileeot . "?#iefix') format('embedded-opentype')";
        }
        $fontfilewoff = $theme->setting_file_url('fontfilewoff' . $type, 'fontfilewoff' . $type);
        if (!empty($fontfilewoff)) {
            $fontfiles[] = "url('" . $fontfilewoff . "') format('woff')";
        }
        $fontfilewofftwo = $theme->setting_file_url('fontfilewofftwo' . $type, 'fontfilewofftwo' . $type);
        if (!empty($fontfilewofftwo)) {
            $fontfiles[] = "url('" . $fontfilewofftwo . "') format('woff2')";
        }
        $fontfileotf = $theme->setting_file_url('fontfileotf' . $type, 'fontfileotf' . $type);
        if (!empty($fontfileotf)) {
            $fontfiles[] = "url('" . $fontfileotf . "') format('opentype')";
        }
        $fontfilettf = $theme->setting_file_url('fontfilettf' . $type, 'fontfilettf' . $type);
        if (!empty($fontfilettf)) {
            $fontfiles[] = "url('" . $fontfilettf . "') format('truetype')";
        }
        $fontfilesvg = $theme->setting_file_url('fontfilesvg' . $type, 'fontfilesvg' . $type);
        if (!empty($fontfilesvg)) {
            $fontfiles[] = "url('" . $fontfilesvg . "') format('svg')";
        }

        $replacement = '@font-face {' . PHP_EOL . 'font-family: "' . $fontname . '";' . PHP_EOL;
        $replacement .=!empty($fontfileeot) ? "src: url('" . $fontfileeot . "');" . PHP_EOL : '';
        if (!empty($fontfiles)) {
            $replacement .= "src: ";
            $replacement .= implode("," . PHP_EOL . " ", $fontfiles);
            $replacement .= ";";
        }
        $replacement .= '' . PHP_EOL . "}";
    }

    $css = str_replace($tag, $replacement, $css);
    return $css;
}
/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_tikli_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('tikli');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        if ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } else if ($filearea === 'style') {
            theme_tikli_serve_css($args[1]);
        } else if ($filearea === 'pagebackground') {
            return $theme->setting_file_serve('pagebackground', $args, $forcedownload, $options);
        } else if ($filearea === 'icon') {
            return $theme->setting_file_serve('icon', $args, $forcedownload, $options);
        } else if ($filearea === 'marketspotfontawesomeicon') {
            return $theme->setting_file_serve('marketspotfontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'marketspotsectionfontawesomeicon1') {
            return $theme->setting_file_serve('marketspotsectionfontawesomeicon1', $args, $forcedownload, $options);
        } else if ($filearea === 'marketspotsectionfontawesomeicon2') {
            return $theme->setting_file_serve('marketspotsectionfontawesomeicon2', $args, $forcedownload, $options);
        } else if ($filearea === 'marketspotsectionfontawesomeicon3') {
            return $theme->setting_file_serve('marketspotsectionfontawesomeicon3', $args, $forcedownload, $options);
        } else if ($filearea === 'marketspotsectionfontawesomeicon4') {
            return $theme->setting_file_serve('marketspotsectionfontawesomeicon4', $args, $forcedownload, $options);
        } else if ($filearea === 'secondmarketspotfontawesomeicon') {
            return $theme->setting_file_serve('secondmarketspotfontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'secondmarketspotsectionfontawesomeicon1') {
            return $theme->setting_file_serve('secondmarketspotsectionfontawesomeicon1', $args, $forcedownload, $options);
        } else if ($filearea === 'secondmarketspotsectionfontawesomeicon2') {
            return $theme->setting_file_serve('secondmarketspotsectionfontawesomeicon2', $args, $forcedownload, $options);
        } else if ($filearea === 'secondmarketspotsectionfontawesomeicon3') {
            return $theme->setting_file_serve('secondmarketspotsectionfontawesomeicon3', $args, $forcedownload, $options);
        } else if ($filearea === 'secondmarketspotsectionfontawesomeicon4') {
            return $theme->setting_file_serve('secondmarketspotsectionfontawesomeicon4', $args, $forcedownload, $options);
        } else if ($filearea === 'contactwithusfontawesomeicon') {
            return $theme->setting_file_serve('contactwithusfontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'socialfontawesomeicon1') {
            return $theme->setting_file_serve('socialfontawesomeicon1', $args, $forcedownload, $options);
        } else if ($filearea === 'socialfontawesomeicon2') {
            return $theme->setting_file_serve('socialfontawesomeicon2', $args, $forcedownload, $options);
        } else if ($filearea === 'socialfontawesomeicon3') {
            return $theme->setting_file_serve('socialfontawesomeicon3', $args, $forcedownload, $options);
        } else if ($filearea === 'socialfontawesomeicon4') {
            return $theme->setting_file_serve('socialfontawesomeicon4', $args, $forcedownload, $options);
        } else if ($filearea === 'addressfontawesomeicon') {
            return $theme->setting_file_serve('addressfontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'phonefontawesomeicon') {
            return $theme->setting_file_serve('phonefontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'emailfontawesomeicon') {
            return $theme->setting_file_serve('emailfontawesomeicon', $args, $forcedownload, $options);
        } else if ($filearea === 'uploadvideo') {
            return $theme->setting_file_serve('uploadvideo', $args, $forcedownload, $options);
        } else if ($filearea === 'logobackgroundimage') {
            return $theme->setting_file_serve('logobackgroundimage', $args, $forcedownload, $options);
        } else if (preg_match("/^fontfile(eot|otf|svg|ttf|woff|woff2)(heading|body)$/", $filearea)) { // http://www.regexr.com/.
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if (preg_match("/^(marketing|slide)[1-9][0-9]*image$/", $filearea)) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else if($filearea === 'slideimage1') {
            return $theme->setting_file_serve('slideimage1', $args, $forcedownload, $options);
        } else if($filearea === 'slideimage2') {
            return $theme->setting_file_serve('slideimage2', $args, $forcedownload, $options);
        } else if($filearea === 'slideimage3') {
            return $theme->setting_file_serve('slideimage3', $args, $forcedownload, $options);
        } else if($filearea === 'slideimage4') {
            return $theme->setting_file_serve('slideimage4', $args, $forcedownload, $options);
        } else if($filearea === 'slideimage5') {
            return $theme->setting_file_serve('slideimage5', $args, $forcedownload, $options);
        } else if($filearea === 'faviconurl') {
            return $theme->setting_file_serve('faviconurl', $args, $forcedownload, $options);
        } else if($filearea === 'thirdsubsectioncolumnimage1') {
            return $theme->setting_file_serve('thirdsubsectioncolumnimage1', $args, $forcedownload, $options);
        } else if($filearea === 'thirdsubsectioncolumnimage2') {
            return $theme->setting_file_serve('thirdsubsectioncolumnimage2', $args, $forcedownload, $options);
        } else if($filearea === 'thirdsubsectioncolumnimage3') {
            return $theme->setting_file_serve('thirdsubsectioncolumnimage3', $args, $forcedownload, $options);
        } else if($filearea === 'thirdsubsectioncolumnimage4') {
            return $theme->setting_file_serve('thirdsubsectioncolumnimage4', $args, $forcedownload, $options);
        } else if($filearea === 'parallaxbackgroundimage') {
            return $theme->setting_file_serve('parallaxbackgroundimage', $args, $forcedownload, $options);
        } else if($filearea === 'someinfoimage') {
            return $theme->setting_file_serve('someinfoimage', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_1_1') {
            return $theme->setting_file_serve('feedbackslideimage_1_1', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_2_1') {
            return $theme->setting_file_serve('feedbackslideimage_2_1', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_3_1') {
            return $theme->setting_file_serve('feedbackslideimage_3_1', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_4_1') {
            return $theme->setting_file_serve('feedbackslideimage_4_1', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_1_2') {
            return $theme->setting_file_serve('feedbackslideimage_1_2', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_2_2') {
            return $theme->setting_file_serve('feedbackslideimage_2_2', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_3_2') {
            return $theme->setting_file_serve('feedbackslideimage_3_2', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_4_2') {
            return $theme->setting_file_serve('feedbackslideimage_4_2', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_1_3') {
            return $theme->setting_file_serve('feedbackslideimage_1_3', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_2_3') {
            return $theme->setting_file_serve('feedbackslideimage_2_3', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_3_3') {
            return $theme->setting_file_serve('feedbackslideimage_3_3', $args, $forcedownload, $options);
        } else if($filearea === 'feedbackslideimage_4_3') {
            return $theme->setting_file_serve('feedbackslideimage_4_3', $args, $forcedownload, $options);
        } else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }

}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_tikli_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * Do not add tikli specific logic in here, child themes should be able to
 * rely on that function just by declaring settings with similar names.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_tikli_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;

    $return->navbarclass = '';
    if (!empty($page->theme->settings->invert)) {
        $return->navbarclass .= ' navbar-inverse';
    }

    if (!empty($page->theme->settings->logo)) {
        $return->heading = html_writer::tag('div', '', array('class' => 'logo'));
    } else {
        $return->heading = $output->page_heading();
    }

    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">'.format_text($page->theme->settings->footnote).'</div>';
    }

    if (!empty($page->theme->settings->leftfootnote)) {
        $return->leftfootnote = format_text($page->theme->settings->leftfootnote);
    }

    if (!empty($page->theme->settings->leftfootnotesection1)) {
        $return->leftfootnotesection1 = $page->theme->settings->leftfootnotesection1;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink1)) {
        $return->leftfootnotesectionlink1 = $page->theme->settings->leftfootnotesectionlink1;
    }

    
    if (!empty($page->theme->settings->leftfootnotesection2)) {
        $return->leftfootnotesection2 = $page->theme->settings->leftfootnotesection2;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink2)) {
        $return->leftfootnotesectionlink2 = $page->theme->settings->leftfootnotesectionlink2;
    }

    if (!empty($page->theme->settings->leftfootnotesection3)) {
        $return->leftfootnotesection3 = $page->theme->settings->leftfootnotesection3;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink3)) {
        $return->leftfootnotesectionlink3 = $page->theme->settings->leftfootnotesectionlink3;
    }

    if (!empty($page->theme->settings->leftfootnotesection4)) {
        $return->leftfootnotesection4 = $page->theme->settings->leftfootnotesection4;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink4)) {
        $return->leftfootnotesectionlink4 = $page->theme->settings->leftfootnotesectionlink4;
    }

    if (!empty($page->theme->settings->leftfootnotesection5)) {
        $return->leftfootnotesection5 = $page->theme->settings->leftfootnotesection5;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink5)) {
        $return->leftfootnotesectionlink5 = $page->theme->settings->leftfootnotesectionlink5;
    }

    if (!empty($page->theme->settings->leftfootnotesection6)) {
        $return->leftfootnotesection6 = $page->theme->settings->leftfootnotesection6;
    }

    if (!empty($page->theme->settings->leftfootnotesectionlink6)) {
        $return->leftfootnotesectionlink6 = $page->theme->settings->leftfootnotesectionlink6;
    }
    return $return;
}

/**
 * All theme functions should start with theme_tikli_
 * @deprecated since 2.5.1
 */
function tikli_process_css() {
    throw new coding_exception('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__);
}

/**
 * All theme functions should start with theme_tikli_
 * @deprecated since 2.5.1
 */
function tikli_set_logo() {
    throw new coding_exception('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__);
}

/**
 * All theme functions should start with theme_tikli_
 * @deprecated since 2.5.1
 */
function tikli_set_customcss() {
    throw new coding_exception('Please call theme_'.__FUNCTION__.' instead of '.__FUNCTION__);
}


